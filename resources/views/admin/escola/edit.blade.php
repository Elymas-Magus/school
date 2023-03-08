@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.escola.actions.edit', ['name' => $escola->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <escola-form
                :action="'{{ $escola->resource_url }}'"
                :data="{{ $escola->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.escola.actions.edit', ['name' => $escola->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.escola.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </escola-form>

        </div>
    
</div>

@endsection