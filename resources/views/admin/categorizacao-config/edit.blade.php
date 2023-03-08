@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.categorizacao-config.actions.edit', ['name' => $categorizacaoConfig->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <categorizacao-config-form
                :action="'{{ $categorizacaoConfig->resource_url }}'"
                :data="{{ $categorizacaoConfig->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.categorizacao-config.actions.edit', ['name' => $categorizacaoConfig->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.categorizacao-config.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </categorizacao-config-form>

        </div>
    
</div>

@endsection