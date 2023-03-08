<div class="form-check row" :class="{'has-danger': errors.has('activated'), 'has-success': fields.activated && fields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''" data-vv-name="activated"  name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.turma.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="errors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activated') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('bol_aee'), 'has-success': fields.bol_aee && fields.bol_aee.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="bol_aee" type="checkbox" v-model="form.bol_aee" v-validate="''" data-vv-name="bol_aee"  name="bol_aee_fake_element">
        <label class="form-check-label" for="bol_aee">
            {{ trans('admin.turma.columns.bol_aee') }}
        </label>
        <input type="hidden" name="bol_aee" :value="form.bol_aee">
        <div v-if="errors.has('bol_aee')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bol_aee') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('escola_id'), 'has-success': fields.escola_id && fields.escola_id.valid }">
    <label for="escola_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turma.columns.escola_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.escola_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('escola_id'), 'form-control-success': fields.escola_id && fields.escola_id.valid}" id="escola_id" name="escola_id" placeholder="{{ trans('admin.turma.columns.escola_id') }}">
        <div v-if="errors.has('escola_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('escola_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turma.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.turma.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('periodo_letivo_id'), 'has-success': fields.periodo_letivo_id && fields.periodo_letivo_id.valid }">
    <label for="periodo_letivo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turma.columns.periodo_letivo_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.periodo_letivo_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('periodo_letivo_id'), 'form-control-success': fields.periodo_letivo_id && fields.periodo_letivo_id.valid}" id="periodo_letivo_id" name="periodo_letivo_id" placeholder="{{ trans('admin.turma.columns.periodo_letivo_id') }}">
        <div v-if="errors.has('periodo_letivo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('periodo_letivo_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('qtd_vagas_alunos'), 'has-success': fields.qtd_vagas_alunos && fields.qtd_vagas_alunos.valid }">
    <label for="qtd_vagas_alunos" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turma.columns.qtd_vagas_alunos') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qtd_vagas_alunos" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('qtd_vagas_alunos'), 'form-control-success': fields.qtd_vagas_alunos && fields.qtd_vagas_alunos.valid}" id="qtd_vagas_alunos" name="qtd_vagas_alunos" placeholder="{{ trans('admin.turma.columns.qtd_vagas_alunos') }}">
        <div v-if="errors.has('qtd_vagas_alunos')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('qtd_vagas_alunos') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('qtd_vagas_alunos_aee'), 'has-success': fields.qtd_vagas_alunos_aee && fields.qtd_vagas_alunos_aee.valid }">
    <label for="qtd_vagas_alunos_aee" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turma.columns.qtd_vagas_alunos_aee') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qtd_vagas_alunos_aee" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('qtd_vagas_alunos_aee'), 'form-control-success': fields.qtd_vagas_alunos_aee && fields.qtd_vagas_alunos_aee.valid}" id="qtd_vagas_alunos_aee" name="qtd_vagas_alunos_aee" placeholder="{{ trans('admin.turma.columns.qtd_vagas_alunos_aee') }}">
        <div v-if="errors.has('qtd_vagas_alunos_aee')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('qtd_vagas_alunos_aee') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('turno_escolar_id'), 'has-success': fields.turno_escolar_id && fields.turno_escolar_id.valid }">
    <label for="turno_escolar_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.turma.columns.turno_escolar_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.turno_escolar_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('turno_escolar_id'), 'form-control-success': fields.turno_escolar_id && fields.turno_escolar_id.valid}" id="turno_escolar_id" name="turno_escolar_id" placeholder="{{ trans('admin.turma.columns.turno_escolar_id') }}">
        <div v-if="errors.has('turno_escolar_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('turno_escolar_id') }}</div>
    </div>
</div>


