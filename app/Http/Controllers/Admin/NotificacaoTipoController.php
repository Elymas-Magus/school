<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NotificacaoTipo\BulkDestroyNotificacaoTipo;
use App\Http\Requests\Admin\NotificacaoTipo\DestroyNotificacaoTipo;
use App\Http\Requests\Admin\NotificacaoTipo\IndexNotificacaoTipo;
use App\Http\Requests\Admin\NotificacaoTipo\StoreNotificacaoTipo;
use App\Http\Requests\Admin\NotificacaoTipo\UpdateNotificacaoTipo;
use App\Models\NotificacaoTipo;
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

class NotificacaoTipoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexNotificacaoTipo $request
     * @return array|Factory|View
     */
    public function index(IndexNotificacaoTipo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(NotificacaoTipo::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id'],

            // set columns to searchIn
            ['id', 'tipo']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.notificacao-tipo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.notificacao-tipo.create');

        return view('admin.notificacao-tipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNotificacaoTipo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreNotificacaoTipo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the NotificacaoTipo
        $notificacaoTipo = NotificacaoTipo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/notificacao-tipos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/notificacao-tipos');
    }

    /**
     * Display the specified resource.
     *
     * @param NotificacaoTipo $notificacaoTipo
     * @throws AuthorizationException
     * @return void
     */
    public function show(NotificacaoTipo $notificacaoTipo)
    {
        $this->authorize('admin.notificacao-tipo.show', $notificacaoTipo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param NotificacaoTipo $notificacaoTipo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(NotificacaoTipo $notificacaoTipo)
    {
        $this->authorize('admin.notificacao-tipo.edit', $notificacaoTipo);


        return view('admin.notificacao-tipo.edit', [
            'notificacaoTipo' => $notificacaoTipo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNotificacaoTipo $request
     * @param NotificacaoTipo $notificacaoTipo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateNotificacaoTipo $request, NotificacaoTipo $notificacaoTipo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values NotificacaoTipo
        $notificacaoTipo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/notificacao-tipos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/notificacao-tipos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyNotificacaoTipo $request
     * @param NotificacaoTipo $notificacaoTipo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyNotificacaoTipo $request, NotificacaoTipo $notificacaoTipo)
    {
        $notificacaoTipo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyNotificacaoTipo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyNotificacaoTipo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    NotificacaoTipo::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
