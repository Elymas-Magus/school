<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notificaco\BulkDestroyNotificaco;
use App\Http\Requests\Admin\Notificaco\DestroyNotificaco;
use App\Http\Requests\Admin\Notificaco\IndexNotificaco;
use App\Http\Requests\Admin\Notificaco\StoreNotificaco;
use App\Http\Requests\Admin\Notificaco\UpdateNotificaco;
use App\Models\Notificaco;
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

class NotificacoesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexNotificaco $request
     * @return array|Factory|View
     */
    public function index(IndexNotificaco $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Notificaco::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['assunto', 'destinatario_id', 'id', 'remetente_id', 'tipo_id'],

            // set columns to searchIn
            ['assunto', 'descricao', 'id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.notificaco.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.notificaco.create');

        return view('admin.notificaco.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNotificaco $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreNotificaco $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Notificaco
        $notificaco = Notificaco::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/notificacos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/notificacos');
    }

    /**
     * Display the specified resource.
     *
     * @param Notificaco $notificaco
     * @throws AuthorizationException
     * @return void
     */
    public function show(Notificaco $notificaco)
    {
        $this->authorize('admin.notificaco.show', $notificaco);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Notificaco $notificaco
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Notificaco $notificaco)
    {
        $this->authorize('admin.notificaco.edit', $notificaco);


        return view('admin.notificaco.edit', [
            'notificaco' => $notificaco,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNotificaco $request
     * @param Notificaco $notificaco
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateNotificaco $request, Notificaco $notificaco)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Notificaco
        $notificaco->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/notificacos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/notificacos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyNotificaco $request
     * @param Notificaco $notificaco
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyNotificaco $request, Notificaco $notificaco)
    {
        $notificaco->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyNotificaco $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyNotificaco $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('notificacos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
