<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategorizacaoItem\BulkDestroyCategorizacaoItem;
use App\Http\Requests\Admin\CategorizacaoItem\DestroyCategorizacaoItem;
use App\Http\Requests\Admin\CategorizacaoItem\IndexCategorizacaoItem;
use App\Http\Requests\Admin\CategorizacaoItem\StoreCategorizacaoItem;
use App\Http\Requests\Admin\CategorizacaoItem\UpdateCategorizacaoItem;
use App\Models\CategorizacaoItem;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategorizacaoItemController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCategorizacaoItem $request
     * @return array|Factory|View
     */
    public function index(IndexCategorizacaoItem $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CategorizacaoItem::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['categorizacao_id', 'id', 'item'],

            // set columns to searchIn
            ['id', 'item']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.categorizacao-item.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.categorizacao-item.create');

        return view('admin.categorizacao-item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategorizacaoItem $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCategorizacaoItem $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CategorizacaoItem
        $categorizacaoItem = CategorizacaoItem::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/categorizacao-items'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/categorizacao-items');
    }

    /**
     * Display the specified resource.
     *
     * @param CategorizacaoItem $categorizacaoItem
     * @throws AuthorizationException
     * @return void
     */
    public function show(CategorizacaoItem $categorizacaoItem)
    {
        $this->authorize('admin.categorizacao-item.show', $categorizacaoItem);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CategorizacaoItem $categorizacaoItem
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CategorizacaoItem $categorizacaoItem)
    {
        $this->authorize('admin.categorizacao-item.edit', $categorizacaoItem);


        return view('admin.categorizacao-item.edit', [
            'categorizacaoItem' => $categorizacaoItem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategorizacaoItem $request
     * @param CategorizacaoItem $categorizacaoItem
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCategorizacaoItem $request, CategorizacaoItem $categorizacaoItem)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CategorizacaoItem
        $categorizacaoItem->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/categorizacao-items'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/categorizacao-items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCategorizacaoItem $request
     * @param CategorizacaoItem $categorizacaoItem
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCategorizacaoItem $request, CategorizacaoItem $categorizacaoItem)
    {
        $categorizacaoItem->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCategorizacaoItem $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCategorizacaoItem $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('categorizacaoItems')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
