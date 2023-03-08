<div class="form-group row align-items-center" :class="{'has-danger': errors.has('categorizacao'), 'has-success': fields.categorizacao && fields.categorizacao.valid }">
    <label for="categorizacao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.categorizacao.columns.categorizacao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.categorizacao" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('categorizacao'), 'form-control-success': fields.categorizacao && fields.categorizacao.valid}" id="categorizacao" name="categorizacao" placeholder="{{ trans('admin.categorizacao.columns.categorizacao') }}">
        <div v-if="errors.has('categorizacao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('categorizacao') }}</div>
    </div>
</div>


