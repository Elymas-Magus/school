<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Escola\BulkDestroyEscola;
use App\Http\Requests\Admin\Escola\DestroyEscola;
use App\Http\Requests\Admin\Escola\IndexEscola;
use App\Http\Requests\Admin\Escola\StoreEscola;
use App\Http\Requests\Admin\Escola\UpdateEscola;
use App\Models\Escola;
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

class EscolasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEscola $request
     * @return array|Factory|View
     */
    public function index(IndexEscola $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Escola::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['activated', 'cep', 'cnpj', 'cod_municipio', 'fone', 'id', 'logradouro', 'nome', 'numero'],

            // set columns to searchIn
            ['cep', 'cnpj', 'cod_municipio', 'fone', 'id', 'logradouro', 'nome']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.escola.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.escola.create');

        return view('admin.escola.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEscola $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEscola $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Escola
        $escola = Escola::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/escolas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/escolas');
    }

    /**
     * Display the specified resource.
     *
     * @param Escola $escola
     * @throws AuthorizationException
     * @return void
     */
    public function show(Escola $escola)
    {
        $this->authorize('admin.escola.show', $escola);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Escola $escola
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Escola $escola)
    {
        $this->authorize('admin.escola.edit', $escola);


        return view('admin.escola.edit', [
            'escola' => $escola,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEscola $request
     * @param Escola $escola
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEscola $request, Escola $escola)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Escola
        $escola->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/escolas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/escolas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEscola $request
     * @param Escola $escola
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEscola $request, Escola $escola)
    {
        $escola->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEscola $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEscola $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('escolas')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
