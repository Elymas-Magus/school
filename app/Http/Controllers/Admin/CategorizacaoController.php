<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categorizacao\BulkDestroyCategorizacao;
use App\Http\Requests\Admin\Categorizacao\DestroyCategorizacao;
use App\Http\Requests\Admin\Categorizacao\IndexCategorizacao;
use App\Http\Requests\Admin\Categorizacao\StoreCategorizacao;
use App\Http\Requests\Admin\Categorizacao\UpdateCategorizacao;
use App\Models\Categorizacao;
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

class CategorizacaoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCategorizacao $request
     * @return array|Factory|View
     */
    public function index(IndexCategorizacao $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Categorizacao::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['categorizacao', 'id'],

            // set columns to searchIn
            ['categorizacao', 'id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.categorizacao.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.categorizacao.create');

        return view('admin.categorizacao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategorizacao $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCategorizacao $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Categorizacao
        $categorizacao = Categorizacao::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/categorizacaos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/categorizacaos');
    }

    /**
     * Display the specified resource.
     *
     * @param Categorizacao $categorizacao
     * @throws AuthorizationException
     * @return void
     */
    public function show(Categorizacao $categorizacao)
    {
        $this->authorize('admin.categorizacao.show', $categorizacao);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Categorizacao $categorizacao
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Categorizacao $categorizacao)
    {
        $this->authorize('admin.categorizacao.edit', $categorizacao);


        return view('admin.categorizacao.edit', [
            'categorizacao' => $categorizacao,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategorizacao $request
     * @param Categorizacao $categorizacao
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCategorizacao $request, Categorizacao $categorizacao)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Categorizacao
        $categorizacao->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/categorizacaos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/categorizacaos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCategorizacao $request
     * @param Categorizacao $categorizacao
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCategorizacao $request, Categorizacao $categorizacao)
    {
        $categorizacao->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCategorizacao $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCategorizacao $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('categorizacaos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
