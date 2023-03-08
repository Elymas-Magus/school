<div class="form-check row" :class="{'has-danger': errors.has('bol_aee'), 'has-success': fields.bol_aee && fields.bol_aee.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="bol_aee" type="checkbox" v-model="form.bol_aee" v-validate="''" data-vv-name="bol_aee"  name="bol_aee_fake_element">
        <label class="form-check-label" for="bol_aee">
            {{ trans('admin.aluno.columns.bol_aee') }}
        </label>
        <input type="hidden" name="bol_aee" :value="form.bol_aee">
        <div v-if="errors.has('bol_aee')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bol_aee') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('celular'), 'has-success': fields.celular && fields.celular.valid }">
    <label for="celular" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.celular') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.celular" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('celular'), 'form-control-success': fields.celular && fields.celular.valid}" id="celular" name="celular" placeholder="{{ trans('admin.aluno.columns.celular') }}">
        <div v-if="errors.has('celular')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('celular') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_matricula'), 'has-success': fields.data_matricula && fields.data_matricula.valid }">
    <label for="data_matricula" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.data_matricula') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_matricula" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_matricula'), 'form-control-success': fields.data_matricula && fields.data_matricula.valid}" id="data_matricula" name="data_matricula" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_matricula')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_matricula') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_nascimento'), 'has-success': fields.data_nascimento && fields.data_nascimento.valid }">
    <label for="data_nascimento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.data_nascimento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_nascimento" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_nascimento'), 'form-control-success': fields.data_nascimento && fields.data_nascimento.valid}" id="data_nascimento" name="data_nascimento" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('data_nascimento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_nascimento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email_responsavel'), 'has-success': fields.email_responsavel && fields.email_responsavel.valid }">
    <label for="email_responsavel" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.email_responsavel') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email_responsavel" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email_responsavel'), 'form-control-success': fields.email_responsavel && fields.email_responsavel.valid}" id="email_responsavel" name="email_responsavel" placeholder="{{ trans('admin.aluno.columns.email_responsavel') }}">
        <div v-if="errors.has('email_responsavel')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email_responsavel') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('escola_id'), 'has-success': fields.escola_id && fields.escola_id.valid }">
    <label for="escola_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.escola_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.escola_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('escola_id'), 'form-control-success': fields.escola_id && fields.escola_id.valid}" id="escola_id" name="escola_id" placeholder="{{ trans('admin.aluno.columns.escola_id') }}">
        <div v-if="errors.has('escola_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('escola_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('registro'), 'has-success': fields.registro && fields.registro.valid }">
    <label for="registro" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.registro') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.registro" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('registro'), 'form-control-success': fields.registro && fields.registro.valid}" id="registro" name="registro" placeholder="{{ trans('admin.aluno.columns.registro') }}">
        <div v-if="errors.has('registro')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('registro') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('telefone'), 'has-success': fields.telefone && fields.telefone.valid }">
    <label for="telefone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.telefone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telefone" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('telefone'), 'form-control-success': fields.telefone && fields.telefone.valid}" id="telefone" name="telefone" placeholder="{{ trans('admin.aluno.columns.telefone') }}">
        <div v-if="errors.has('telefone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telefone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('turma_id'), 'has-success': fields.turma_id && fields.turma_id.valid }">
    <label for="turma_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.turma_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.turma_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('turma_id'), 'form-control-success': fields.turma_id && fields.turma_id.valid}" id="turma_id" name="turma_id" placeholder="{{ trans('admin.aluno.columns.turma_id') }}">
        <div v-if="errors.has('turma_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('turma_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aluno.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.aluno.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>


