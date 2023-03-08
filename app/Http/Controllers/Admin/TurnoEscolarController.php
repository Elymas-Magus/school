<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TurnoEscolar\BulkDestroyTurnoEscolar;
use App\Http\Requests\Admin\TurnoEscolar\DestroyTurnoEscolar;
use App\Http\Requests\Admin\TurnoEscolar\IndexTurnoEscolar;
use App\Http\Requests\Admin\TurnoEscolar\StoreTurnoEscolar;
use App\Http\Requests\Admin\TurnoEscolar\UpdateTurnoEscolar;
use App\Models\TurnoEscolar;
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

class TurnoEscolarController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTurnoEscolar $request
     * @return array|Factory|View
     */
    public function index(IndexTurnoEscolar $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(TurnoEscolar::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['descricao', 'id', 'titulo'],

            // set columns to searchIn
            ['descricao', 'id', 'titulo']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.turno-escolar.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.turno-escolar.create');

        return view('admin.turno-escolar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTurnoEscolar $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTurnoEscolar $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the TurnoEscolar
        $turnoEscolar = TurnoEscolar::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/turno-escolars'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/turno-escolars');
    }

    /**
     * Display the specified resource.
     *
     * @param TurnoEscolar $turnoEscolar
     * @throws AuthorizationException
     * @return void
     */
    public function show(TurnoEscolar $turnoEscolar)
    {
        $this->authorize('admin.turno-escolar.show', $turnoEscolar);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TurnoEscolar $turnoEscolar
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(TurnoEscolar $turnoEscolar)
    {
        $this->authorize('admin.turno-escolar.edit', $turnoEscolar);


        return view('admin.turno-escolar.edit', [
            'turnoEscolar' => $turnoEscolar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTurnoEscolar $request
     * @param TurnoEscolar $turnoEscolar
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTurnoEscolar $request, TurnoEscolar $turnoEscolar)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values TurnoEscolar
        $turnoEscolar->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/turno-escolars'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/turno-escolars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTurnoEscolar $request
     * @param TurnoEscolar $turnoEscolar
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTurnoEscolar $request, TurnoEscolar $turnoEscolar)
    {
        $turnoEscolar->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTurnoEscolar $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTurnoEscolar $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('turnoEscolars')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
