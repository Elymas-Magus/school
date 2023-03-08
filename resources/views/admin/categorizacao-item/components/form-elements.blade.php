<div class="form-group row align-items-center" :class="{'has-danger': errors.has('categorizacao_id'), 'has-success': fields.categorizacao_id && fields.categorizacao_id.valid }">
    <label for="categorizacao_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.categorizacao-item.columns.categorizacao_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.categorizacao_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('categorizacao_id'), 'form-control-success': fields.categorizacao_id && fields.categorizacao_id.valid}" id="categorizacao_id" name="categorizacao_id" placeholder="{{ trans('admin.categorizacao-item.columns.categorizacao_id') }}">
        <div v-if="errors.has('categorizacao_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('categorizacao_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('item'), 'has-success': fields.item && fields.item.valid }">
    <label for="item" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.categorizacao-item.columns.item') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.item" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('item'), 'form-control-success': fields.item && fields.item.valid}" id="item" name="item" placeholder="{{ trans('admin.categorizacao-item.columns.item') }}">
        <div v-if="errors.has('item')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('item') }}</div>
    </div>
</div>


