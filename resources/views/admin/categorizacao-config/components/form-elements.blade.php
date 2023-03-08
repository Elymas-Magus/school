<div class="form-group row align-items-center" :class="{'has-danger': errors.has('categorizacao_item_id'), 'has-success': fields.categorizacao_item_id && fields.categorizacao_item_id.valid }">
    <label for="categorizacao_item_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.categorizacao-config.columns.categorizacao_item_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.categorizacao_item_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('categorizacao_item_id'), 'form-control-success': fields.categorizacao_item_id && fields.categorizacao_item_id.valid}" id="categorizacao_item_id" name="categorizacao_item_id" placeholder="{{ trans('admin.categorizacao-config.columns.categorizacao_item_id') }}">
        <div v-if="errors.has('categorizacao_item_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('categorizacao_item_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_fim'), 'has-success': fields.data_fim && fields.data_fim.valid }">
    <label for="data_fim" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.categorizacao-config.columns.data_fim') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_fim" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_fim'), 'form-control-success': fields.data_fim && fields.data_fim.valid}" id="data_fim" name="data_fim" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_fim')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_fim') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_inicio'), 'has-success': fields.data_inicio && fields.data_inicio.valid }">
    <label for="data_inicio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.categorizacao-config.columns.data_inicio') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_inicio" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_inicio'), 'form-control-success': fields.data_inicio && fields.data_inicio.valid}" id="data_inicio" name="data_inicio" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_inicio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_inicio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nota_total'), 'has-success': fields.nota_total && fields.nota_total.valid }">
    <label for="nota_total" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.categorizacao-config.columns.nota_total') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nota_total" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nota_total'), 'form-control-success': fields.nota_total && fields.nota_total.valid}" id="nota_total" name="nota_total" placeholder="{{ trans('admin.categorizacao-config.columns.nota_total') }}">
        <div v-if="errors.has('nota_total')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nota_total') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('periodo_letivo_id'), 'has-success': fields.periodo_letivo_id && fields.periodo_letivo_id.valid }">
    <label for="periodo_letivo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.categorizacao-config.columns.periodo_letivo_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.periodo_letivo_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('periodo_letivo_id'), 'form-control-success': fields.periodo_letivo_id && fields.periodo_letivo_id.valid}" id="periodo_letivo_id" name="periodo_letivo_id" placeholder="{{ trans('admin.categorizacao-config.columns.periodo_letivo_id') }}">
        <div v-if="errors.has('periodo_letivo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('periodo_letivo_id') }}</div>
    </div>
</div>


