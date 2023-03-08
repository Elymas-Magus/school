@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.turno-escolar.actions.edit', ['name' => $turnoEscolar->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <turno-escolar-form
                :action="'{{ $turnoEscolar->resource_url }}'"
                :data="{{ $turnoEscolar->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.turno-escolar.actions.edit', ['name' => $turnoEscolar->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.turno-escolar.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </turno-escolar-form>

        </div>
    
</div>

@endsection