<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CursoGrade\BulkDestroyCursoGrade;
use App\Http\Requests\Admin\CursoGrade\DestroyCursoGrade;
use App\Http\Requests\Admin\CursoGrade\IndexCursoGrade;
use App\Http\Requests\Admin\CursoGrade\StoreCursoGrade;
use App\Http\Requests\Admin\CursoGrade\UpdateCursoGrade;
use App\Models\CursoGrade;
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

class CursoGradeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCursoGrade $request
     * @return array|Factory|View
     */
    public function index(IndexCursoGrade $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CursoGrade::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['activated', 'bol_optativa', 'carga_horaria', 'color', 'curso_id', 'descricao', 'hora_aula', 'id', 'nome', 'periodo'],

            // set columns to searchIn
            ['color', 'descricao', 'id', 'nome']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.curso-grade.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.curso-grade.create');

        return view('admin.curso-grade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCursoGrade $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCursoGrade $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CursoGrade
        $cursoGrade = CursoGrade::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/curso-grades'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/curso-grades');
    }

    /**
     * Display the specified resource.
     *
     * @param CursoGrade $cursoGrade
     * @throws AuthorizationException
     * @return void
     */
    public function show(CursoGrade $cursoGrade)
    {
        $this->authorize('admin.curso-grade.show', $cursoGrade);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CursoGrade $cursoGrade
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CursoGrade $cursoGrade)
    {
        $this->authorize('admin.curso-grade.edit', $cursoGrade);


        return view('admin.curso-grade.edit', [
            'cursoGrade' => $cursoGrade,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCursoGrade $request
     * @param CursoGrade $cursoGrade
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCursoGrade $request, CursoGrade $cursoGrade)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CursoGrade
        $cursoGrade->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/curso-grades'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/curso-grades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCursoGrade $request
     * @param CursoGrade $cursoGrade
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCursoGrade $request, CursoGrade $cursoGrade)
    {
        $cursoGrade->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCursoGrade $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCursoGrade $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('cursoGrades')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
