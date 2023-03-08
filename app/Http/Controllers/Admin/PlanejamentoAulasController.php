<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PlanejamentoAula\BulkDestroyPlanejamentoAula;
use App\Http\Requests\Admin\PlanejamentoAula\DestroyPlanejamentoAula;
use App\Http\Requests\Admin\PlanejamentoAula\IndexPlanejamentoAula;
use App\Http\Requests\Admin\PlanejamentoAula\StorePlanejamentoAula;
use App\Http\Requests\Admin\PlanejamentoAula\UpdatePlanejamentoAula;
use App\Models\PlanejamentoAula;
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

class PlanejamentoAulasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPlanejamentoAula $request
     * @return array|Factory|View
     */
    public function index(IndexPlanejamentoAula $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PlanejamentoAula::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['data_fim', 'data_inicio', 'disciplina_id', 'id', 'titulo'],

            // set columns to searchIn
            ['conteudo', 'habilidades_competencias', 'id', 'titulo']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.planejamento-aula.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.planejamento-aula.create');

        return view('admin.planejamento-aula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePlanejamentoAula $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePlanejamentoAula $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PlanejamentoAula
        $planejamentoAula = PlanejamentoAula::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/planejamento-aulas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/planejamento-aulas');
    }

    /**
     * Display the specified resource.
     *
     * @param PlanejamentoAula $planejamentoAula
     * @throws AuthorizationException
     * @return void
     */
    public function show(PlanejamentoAula $planejamentoAula)
    {
        $this->authorize('admin.planejamento-aula.show', $planejamentoAula);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PlanejamentoAula $planejamentoAula
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PlanejamentoAula $planejamentoAula)
    {
        $this->authorize('admin.planejamento-aula.edit', $planejamentoAula);


        return view('admin.planejamento-aula.edit', [
            'planejamentoAula' => $planejamentoAula,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePlanejamentoAula $request
     * @param PlanejamentoAula $planejamentoAula
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePlanejamentoAula $request, PlanejamentoAula $planejamentoAula)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PlanejamentoAula
        $planejamentoAula->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/planejamento-aulas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/planejamento-aulas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPlanejamentoAula $request
     * @param PlanejamentoAula $planejamentoAula
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPlanejamentoAula $request, PlanejamentoAula $planejamentoAula)
    {
        $planejamentoAula->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPlanejamentoAula $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPlanejamentoAula $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('planejamentoAulas')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
