<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.plataforma-transmissao.columns.descricao') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.descricao" v-validate="''" id="descricao" name="descricao"></textarea>
        </div>
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('plataforma'), 'has-success': fields.plataforma && fields.plataforma.valid }">
    <label for="plataforma" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.plataforma-transmissao.columns.plataforma') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.plataforma" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('plataforma'), 'form-control-success': fields.plataforma && fields.plataforma.valid}" id="plataforma" name="plataforma" placeholder="{{ trans('admin.plataforma-transmissao.columns.plataforma') }}">
        <div v-if="errors.has('plataforma')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('plataforma') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('site'), 'has-success': fields.site && fields.site.valid }">
    <label for="site" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.plataforma-transmissao.columns.site') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.site" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('site'), 'form-control-success': fields.site && fields.site.valid}" id="site" name="site" placeholder="{{ trans('admin.plataforma-transmissao.columns.site') }}">
        <div v-if="errors.has('site')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('site') }}</div>
    </div>
</div>


