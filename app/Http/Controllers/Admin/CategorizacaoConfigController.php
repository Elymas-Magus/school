<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategorizacaoConfig\BulkDestroyCategorizacaoConfig;
use App\Http\Requests\Admin\CategorizacaoConfig\DestroyCategorizacaoConfig;
use App\Http\Requests\Admin\CategorizacaoConfig\IndexCategorizacaoConfig;
use App\Http\Requests\Admin\CategorizacaoConfig\StoreCategorizacaoConfig;
use App\Http\Requests\Admin\CategorizacaoConfig\UpdateCategorizacaoConfig;
use App\Models\CategorizacaoConfig;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategorizacaoConfigController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCategorizacaoConfig $request
     * @return array|Factory|View
     */
    public function index(IndexCategorizacaoConfig $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CategorizacaoConfig::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['categorizacao_item_id', 'data_fim', 'data_inicio', 'id', 'nota_total', 'periodo_letivo_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.categorizacao-config.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.categorizacao-config.create');

        return view('admin.categorizacao-config.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategorizacaoConfig $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCategorizacaoConfig $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CategorizacaoConfig
        $categorizacaoConfig = CategorizacaoConfig::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/categorizacao-configs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/categorizacao-configs');
    }

    /**
     * Display the specified resource.
     *
     * @param CategorizacaoConfig $categorizacaoConfig
     * @throws AuthorizationException
     * @return void
     */
    public function show(CategorizacaoConfig $categorizacaoConfig)
    {
        $this->authorize('admin.categorizacao-config.show', $categorizacaoConfig);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CategorizacaoConfig $categorizacaoConfig
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CategorizacaoConfig $categorizacaoConfig)
    {
        $this->authorize('admin.categorizacao-config.edit', $categorizacaoConfig);


        return view('admin.categorizacao-config.edit', [
            'categorizacaoConfig' => $categorizacaoConfig,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategorizacaoConfig $request
     * @param CategorizacaoConfig $categorizacaoConfig
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCategorizacaoConfig $request, CategorizacaoConfig $categorizacaoConfig)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CategorizacaoConfig
        $categorizacaoConfig->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/categorizacao-configs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/categorizacao-configs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCategorizacaoConfig $request
     * @param CategorizacaoConfig $categorizacaoConfig
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCategorizacaoConfig $request, CategorizacaoConfig $categorizacaoConfig)
    {
        $categorizacaoConfig->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCategorizacaoConfig $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCategorizacaoConfig $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CategorizacaoConfig::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
