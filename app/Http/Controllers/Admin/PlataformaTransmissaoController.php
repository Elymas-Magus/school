<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlataformaTransmissao\BulkDestroyPlataformaTransmissao;
use App\Http\Requests\Admin\PlataformaTransmissao\DestroyPlataformaTransmissao;
use App\Http\Requests\Admin\PlataformaTransmissao\IndexPlataformaTransmissao;
use App\Http\Requests\Admin\PlataformaTransmissao\StorePlataformaTransmissao;
use App\Http\Requests\Admin\PlataformaTransmissao\UpdatePlataformaTransmissao;
use App\Models\PlataformaTransmissao;
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

class PlataformaTransmissaoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPlataformaTransmissao $request
     * @return array|Factory|View
     */
    public function index(IndexPlataformaTransmissao $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PlataformaTransmissao::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'plataforma', 'site'],

            // set columns to searchIn
            ['descricao', 'id', 'plataforma', 'site']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.plataforma-transmissao.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.plataforma-transmissao.create');

        return view('admin.plataforma-transmissao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePlataformaTransmissao $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePlataformaTransmissao $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PlataformaTransmissao
        $plataformaTransmissao = PlataformaTransmissao::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/plataforma-transmissaos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/plataforma-transmissaos');
    }

    /**
     * Display the specified resource.
     *
     * @param PlataformaTransmissao $plataformaTransmissao
     * @throws AuthorizationException
     * @return void
     */
    public function show(PlataformaTransmissao $plataformaTransmissao)
    {
        $this->authorize('admin.plataforma-transmissao.show', $plataformaTransmissao);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PlataformaTransmissao $plataformaTransmissao
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PlataformaTransmissao $plataformaTransmissao)
    {
        $this->authorize('admin.plataforma-transmissao.edit', $plataformaTransmissao);


        return view('admin.plataforma-transmissao.edit', [
            'plataformaTransmissao' => $plataformaTransmissao,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePlataformaTransmissao $request
     * @param PlataformaTransmissao $plataformaTransmissao
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePlataformaTransmissao $request, PlataformaTransmissao $plataformaTransmissao)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PlataformaTransmissao
        $plataformaTransmissao->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/plataforma-transmissaos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/plataforma-transmissaos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPlataformaTransmissao $request
     * @param PlataformaTransmissao $plataformaTransmissao
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPlataformaTransmissao $request, PlataformaTransmissao $plataformaTransmissao)
    {
        $plataformaTransmissao->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPlataformaTransmissao $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPlataformaTransmissao $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('plataformaTransmissaos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
