@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.plataforma-transmissao.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <plataforma-transmissao-form
            :action="'{{ url('admin/plataforma-transmissaos') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.plataforma-transmissao.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.plataforma-transmissao.components.form-elements')
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </plataforma-transmissao-form>

        </div>

        </div>

    
@endsection