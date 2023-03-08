@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.curso-grade.actions.edit', ['name' => $cursoGrade->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <curso-grade-form
                :action="'{{ $cursoGrade->resource_url }}'"
                :data="{{ $cursoGrade->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.curso-grade.actions.edit', ['name' => $cursoGrade->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.curso-grade.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </curso-grade-form>

        </div>
    
</div>

@endsection