<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Aula\BulkDestroyAula;
use App\Http\Requests\Admin\Aula\DestroyAula;
use App\Http\Requests\Admin\Aula\IndexAula;
use App\Http\Requests\Admin\Aula\StoreAula;
use App\Http\Requests\Admin\Aula\UpdateAula;
use App\Models\Aula;
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

class AulasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAula $request
     * @return array|Factory|View
     */
    public function index(IndexAula $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Aula::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['bol_online', 'categorizacao_item_id', 'data_fim', 'data_inicio', 'disciplina_id', 'escola_id', 'id', 'link_transmissao', 'periodo_letivo_id', 'planejamento_id', 'plataforma_id', 'professor_id', 'replica_id', 'titulo'],

            // set columns to searchIn
            ['id', 'link_transmissao', 'observacoes', 'titulo']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.aula.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.aula.create');

        return view('admin.aula.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAula $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAula $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Aula
        $aula = Aula::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/aulas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/aulas');
    }

    /**
     * Display the specified resource.
     *
     * @param Aula $aula
     * @throws AuthorizationException
     * @return void
     */
    public function show(Aula $aula)
    {
        $this->authorize('admin.aula.show', $aula);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Aula $aula
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Aula $aula)
    {
        $this->authorize('admin.aula.edit', $aula);


        return view('admin.aula.edit', [
            'aula' => $aula,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAula $request
     * @param Aula $aula
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAula $request, Aula $aula)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Aula
        $aula->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/aulas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/aulas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAula $request
     * @param Aula $aula
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAula $request, Aula $aula)
    {
        $aula->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAula $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAula $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('aulas')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
