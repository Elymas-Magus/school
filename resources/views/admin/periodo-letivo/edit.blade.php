@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.periodo-letivo.actions.edit', ['name' => $periodoLetivo->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <periodo-letivo-form
                :action="'{{ $periodoLetivo->resource_url }}'"
                :data="{{ $periodoLetivo->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.periodo-letivo.actions.edit', ['name' => $periodoLetivo->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.periodo-letivo.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </periodo-letivo-form>

        </div>
    
</div>

@endsection