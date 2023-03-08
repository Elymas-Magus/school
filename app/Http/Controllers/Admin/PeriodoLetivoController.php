<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PeriodoLetivo\BulkDestroyPeriodoLetivo;
use App\Http\Requests\Admin\PeriodoLetivo\DestroyPeriodoLetivo;
use App\Http\Requests\Admin\PeriodoLetivo\IndexPeriodoLetivo;
use App\Http\Requests\Admin\PeriodoLetivo\StorePeriodoLetivo;
use App\Http\Requests\Admin\PeriodoLetivo\UpdatePeriodoLetivo;
use App\Models\PeriodoLetivo;
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

class PeriodoLetivoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPeriodoLetivo $request
     * @return array|Factory|View
     */
    public function index(IndexPeriodoLetivo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PeriodoLetivo::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['activated', 'ano_referencia', 'carga_horaria', 'categorizacao_id', 'created_by', 'data_fim', 'data_fim_rematricula', 'data_inicio', 'data_inicio_rematricula', 'dias_letivos', 'escola_id', 'id', 'media', 'nome'],

            // set columns to searchIn
            ['id', 'nome', 'observacao']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.periodo-letivo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.periodo-letivo.create');

        return view('admin.periodo-letivo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePeriodoLetivo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePeriodoLetivo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PeriodoLetivo
        $periodoLetivo = PeriodoLetivo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/periodo-letivos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/periodo-letivos');
    }

    /**
     * Display the specified resource.
     *
     * @param PeriodoLetivo $periodoLetivo
     * @throws AuthorizationException
     * @return void
     */
    public function show(PeriodoLetivo $periodoLetivo)
    {
        $this->authorize('admin.periodo-letivo.show', $periodoLetivo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PeriodoLetivo $periodoLetivo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PeriodoLetivo $periodoLetivo)
    {
        $this->authorize('admin.periodo-letivo.edit', $periodoLetivo);


        return view('admin.periodo-letivo.edit', [
            'periodoLetivo' => $periodoLetivo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePeriodoLetivo $request
     * @param PeriodoLetivo $periodoLetivo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePeriodoLetivo $request, PeriodoLetivo $periodoLetivo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PeriodoLetivo
        $periodoLetivo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/periodo-letivos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/periodo-letivos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPeriodoLetivo $request
     * @param PeriodoLetivo $periodoLetivo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPeriodoLetivo $request, PeriodoLetivo $periodoLetivo)
    {
        $periodoLetivo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPeriodoLetivo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPeriodoLetivo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('periodoLetivos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
