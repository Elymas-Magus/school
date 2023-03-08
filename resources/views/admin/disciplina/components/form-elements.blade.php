<div class="form-check row" :class="{'has-danger': errors.has('activated'), 'has-success': fields.activated && fields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''" data-vv-name="activated"  name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.disciplina.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="errors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activated') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('carga_horaria'), 'has-success': fields.carga_horaria && fields.carga_horaria.valid }">
    <label for="carga_horaria" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disciplina.columns.carga_horaria') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.carga_horaria" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('carga_horaria'), 'form-control-success': fields.carga_horaria && fields.carga_horaria.valid}" id="carga_horaria" name="carga_horaria" placeholder="{{ trans('admin.disciplina.columns.carga_horaria') }}">
        <div v-if="errors.has('carga_horaria')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('carga_horaria') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('curso_grade_id'), 'has-success': fields.curso_grade_id && fields.curso_grade_id.valid }">
    <label for="curso_grade_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disciplina.columns.curso_grade_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.curso_grade_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('curso_grade_id'), 'form-control-success': fields.curso_grade_id && fields.curso_grade_id.valid}" id="curso_grade_id" name="curso_grade_id" placeholder="{{ trans('admin.disciplina.columns.curso_grade_id') }}">
        <div v-if="errors.has('curso_grade_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('curso_grade_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disciplina.columns.descricao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.descricao" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('descricao'), 'form-control-success': fields.descricao && fields.descricao.valid}" id="descricao" name="descricao" placeholder="{{ trans('admin.disciplina.columns.descricao') }}">
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('hora_aula'), 'has-success': fields.hora_aula && fields.hora_aula.valid }">
    <label for="hora_aula" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disciplina.columns.hora_aula') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.hora_aula" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('hora_aula'), 'form-control-success': fields.hora_aula && fields.hora_aula.valid}" id="hora_aula" name="hora_aula" placeholder="{{ trans('admin.disciplina.columns.hora_aula') }}">
        <div v-if="errors.has('hora_aula')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('hora_aula') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disciplina.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.disciplina.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('periodo_letivo_id'), 'has-success': fields.periodo_letivo_id && fields.periodo_letivo_id.valid }">
    <label for="periodo_letivo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disciplina.columns.periodo_letivo_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.periodo_letivo_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('periodo_letivo_id'), 'form-control-success': fields.periodo_letivo_id && fields.periodo_letivo_id.valid}" id="periodo_letivo_id" name="periodo_letivo_id" placeholder="{{ trans('admin.disciplina.columns.periodo_letivo_id') }}">
        <div v-if="errors.has('periodo_letivo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('periodo_letivo_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('professor_id'), 'has-success': fields.professor_id && fields.professor_id.valid }">
    <label for="professor_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disciplina.columns.professor_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.professor_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('professor_id'), 'form-control-success': fields.professor_id && fields.professor_id.valid}" id="professor_id" name="professor_id" placeholder="{{ trans('admin.disciplina.columns.professor_id') }}">
        <div v-if="errors.has('professor_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('professor_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('turma_id'), 'has-success': fields.turma_id && fields.turma_id.valid }">
    <label for="turma_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.disciplina.columns.turma_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.turma_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('turma_id'), 'form-control-success': fields.turma_id && fields.turma_id.valid}" id="turma_id" name="turma_id" placeholder="{{ trans('admin.disciplina.columns.turma_id') }}">
        <div v-if="errors.has('turma_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('turma_id') }}</div>
    </div>
</div>


