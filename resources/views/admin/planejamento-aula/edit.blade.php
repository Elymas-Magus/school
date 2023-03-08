@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.planejamento-aula.actions.edit', ['name' => $planejamentoAula->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <planejamento-aula-form
                :action="'{{ $planejamentoAula->resource_url }}'"
                :data="{{ $planejamentoAula->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.planejamento-aula.actions.edit', ['name' => $planejamentoAula->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.planejamento-aula.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </planejamento-aula-form>

        </div>
    
</div>

@endsection