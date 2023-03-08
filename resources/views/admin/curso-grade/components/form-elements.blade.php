<div class="form-check row" :class="{'has-danger': errors.has('activated'), 'has-success': fields.activated && fields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''" data-vv-name="activated"  name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.curso-grade.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="errors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activated') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('bol_optativa'), 'has-success': fields.bol_optativa && fields.bol_optativa.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="bol_optativa" type="checkbox" v-model="form.bol_optativa" v-validate="''" data-vv-name="bol_optativa"  name="bol_optativa_fake_element">
        <label class="form-check-label" for="bol_optativa">
            {{ trans('admin.curso-grade.columns.bol_optativa') }}
        </label>
        <input type="hidden" name="bol_optativa" :value="form.bol_optativa">
        <div v-if="errors.has('bol_optativa')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bol_optativa') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('carga_horaria'), 'has-success': fields.carga_horaria && fields.carga_horaria.valid }">
    <label for="carga_horaria" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.curso-grade.columns.carga_horaria') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.carga_horaria" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('carga_horaria'), 'form-control-success': fields.carga_horaria && fields.carga_horaria.valid}" id="carga_horaria" name="carga_horaria" placeholder="{{ trans('admin.curso-grade.columns.carga_horaria') }}">
        <div v-if="errors.has('carga_horaria')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('carga_horaria') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('color'), 'has-success': fields.color && fields.color.valid }">
    <label for="color" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.curso-grade.columns.color') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.color" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('color'), 'form-control-success': fields.color && fields.color.valid}" id="color" name="color" placeholder="{{ trans('admin.curso-grade.columns.color') }}">
        <div v-if="errors.has('color')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('color') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('curso_id'), 'has-success': fields.curso_id && fields.curso_id.valid }">
    <label for="curso_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.curso-grade.columns.curso_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.curso_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('curso_id'), 'form-control-success': fields.curso_id && fields.curso_id.valid}" id="curso_id" name="curso_id" placeholder="{{ trans('admin.curso-grade.columns.curso_id') }}">
        <div v-if="errors.has('curso_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('curso_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.curso-grade.columns.descricao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descricao" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descricao'), 'form-control-success': fields.descricao && fields.descricao.valid}" id="descricao" name="descricao" placeholder="{{ trans('admin.curso-grade.columns.descricao') }}">
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('hora_aula'), 'has-success': fields.hora_aula && fields.hora_aula.valid }">
    <label for="hora_aula" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.curso-grade.columns.hora_aula') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.hora_aula" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('hora_aula'), 'form-control-success': fields.hora_aula && fields.hora_aula.valid}" id="hora_aula" name="hora_aula" placeholder="{{ trans('admin.curso-grade.columns.hora_aula') }}">
        <div v-if="errors.has('hora_aula')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('hora_aula') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.curso-grade.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.curso-grade.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('periodo'), 'has-success': fields.periodo && fields.periodo.valid }">
    <label for="periodo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.curso-grade.columns.periodo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.periodo" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('periodo'), 'form-control-success': fields.periodo && fields.periodo.valid}" id="periodo" name="periodo" placeholder="{{ trans('admin.curso-grade.columns.periodo') }}">
        <div v-if="errors.has('periodo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('periodo') }}</div>
    </div>
</div>


