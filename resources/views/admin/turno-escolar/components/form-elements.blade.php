<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turno-escolar.columns.descricao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descricao" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descricao'), 'form-control-success': fields.descricao && fields.descricao.valid}" id="descricao" name="descricao" placeholder="{{ trans('admin.turno-escolar.columns.descricao') }}">
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('titulo'), 'has-success': fields.titulo && fields.titulo.valid }">
    <label for="titulo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turno-escolar.columns.titulo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.titulo" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('titulo'), 'form-control-success': fields.titulo && fields.titulo.valid}" id="titulo" name="titulo" placeholder="{{ trans('admin.turno-escolar.columns.titulo') }}">
        <div v-if="errors.has('titulo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('titulo') }}</div>
    </div>
</div>


