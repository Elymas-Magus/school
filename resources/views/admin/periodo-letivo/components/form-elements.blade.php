<div class="form-check row" :class="{'has-danger': errors.has('activated'), 'has-success': fields.activated && fields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''" data-vv-name="activated"  name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.periodo-letivo.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="errors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('activated') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ano_referencia'), 'has-success': fields.ano_referencia && fields.ano_referencia.valid }">
    <label for="ano_referencia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.periodo-letivo.columns.ano_referencia') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ano_referencia" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ano_referencia'), 'form-control-success': fields.ano_referencia && fields.ano_referencia.valid}" id="ano_referencia" name="ano_referencia" placeholder="{{ trans('admin.periodo-letivo.columns.ano_referencia') }}">
        <div v-if="errors.has('ano_referencia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ano_referencia') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('carga_horaria'), 'has-success': fields.carga_horaria && fields.carga_horaria.valid }">
    <label for="carga_horaria" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.periodo-letivo.columns.carga_horaria') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.carga_horaria" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('carga_horaria'), 'form-control-success': fields.carga_horaria && fields.carga_horaria.valid}" id="carga_horaria" name="carga_horaria" placeholder="{{ trans('admin.periodo-letivo.columns.carga_horaria') }}">
        <div v-if="errors.has('carga_horaria')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('carga_horaria') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('categorizacao_id'), 'has-success': fields.categorizacao_id && fields.categorizacao_id.valid }">
    <label for="categorizacao_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.periodo-letivo.columns.categorizacao_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.categorizacao_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('categorizacao_id'), 'form-control-success': fields.categorizacao_id && fields.categorizacao_id.valid}" id="categorizacao_id" name="categorizacao_id" placeholder="{{ trans('admin.periodo-letivo.columns.categorizacao_id') }}">
        <div v-if="errors.has('categorizacao_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('categorizacao_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('created_by'), 'has-success': fields.created_by && fields.created_by.valid }">
    <label for="created_by" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.periodo-letivo.columns.created_by') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.created_by" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('created_by'), 'form-control-success': fields.created_by && fields.created_by.valid}" id="created_by" name="created_by" placeholder="{{ trans('admin.periodo-letivo.columns.created_by') }}">
        <div v-if="errors.has('created_by')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('created_by') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_fim'), 'has-success': fields.data_fim && fields.data_fim.valid }">
    <label for="data_fim" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.periodo-letivo.columns.data_fim') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_fim" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_fim'), 'form-control-success': fields.data_fim && fields.data_fim.valid}" id="data_fim" name="data_fim" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('data_fim')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_fim') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_fim_rematricula'), 'has-success': fields.data_fim_rematricula && fields.data_fim_rematricula.valid }">
    <label for="data_fim_rematricula" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.periodo-letivo.columns.data_fim_rematricula') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_fim_rematricula" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_fim_rematricula'), 'form-control-success': fields.data_fim_rematricula && fields.data_fim_rematricula.valid}" id="data_fim_rematricula" name="data_fim_rematricula" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('data_fim_rematricula')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_fim_rematricula') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_inicio'), 'has-success': fields.data_inicio && fields.data_inicio.valid }">
    <label for="data_inicio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.periodo-letivo.columns.data_inicio') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_inicio" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_inicio'), 'form-control-success': fields.data_inicio && fields.data_inicio.valid}" id="data_inicio" name="data_inicio" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('data_inicio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_inicio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_inicio_rematricula'), 'has-success': fields.data_inicio_rematricula && fields.data_inicio_rematricula.valid }">
    <label for="data_inicio_rematricula" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.periodo-letivo.columns.data_inicio_rematricula') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_inicio_rematricula" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_inicio_rematricula'), 'form-control-success': fields.data_inicio_rematricula && fields.data_inicio_rematricula.valid}" id="data_inicio_rematricula" name="data_inicio_rematricula" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('data_inicio_rematricula')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_inicio_rematricula') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('dias_letivos'), 'has-success': fields.dias_letivos && fields.dias_letivos.valid }">
    <label for="dias_letivos" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.periodo-letivo.columns.dias_letivos') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.dias_letivos" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('dias_letivos'), 'form-control-success': fields.dias_letivos && fields.dias_letivos.valid}" id="dias_letivos" name="dias_letivos" placeholder="{{ trans('admin.periodo-letivo.columns.dias_letivos') }}">
        <div v-if="errors.has('dias_letivos')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('dias_letivos') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('escola_id'), 'has-success': fields.escola_id && fields.escola_id.valid }">
    <label for="escola_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.periodo-letivo.columns.escola_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.escola_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('escola_id'), 'form-control-success': fields.escola_id && fields.escola_id.valid}" id="escola_id" name="escola_id" placeholder="{{ trans('admin.periodo-letivo.columns.escola_id') }}">
        <div v-if="errors.has('escola_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('escola_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('media'), 'has-success': fields.media && fields.media.valid }">
    <label for="media" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.periodo-letivo.columns.media') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.media" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('media'), 'form-control-success': fields.media && fields.media.valid}" id="media" name="media" placeholder="{{ trans('admin.periodo-letivo.columns.media') }}">
        <div v-if="errors.has('media')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('media') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.periodo-letivo.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.periodo-letivo.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('observacao'), 'has-success': fields.observacao && fields.observacao.valid }">
    <label for="observacao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.periodo-letivo.columns.observacao') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.observacao" v-validate="'required'" id="observacao" name="observacao"></textarea>
        </div>
        <div v-if="errors.has('observacao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('observacao') }}</div>
    </div>
</div>


