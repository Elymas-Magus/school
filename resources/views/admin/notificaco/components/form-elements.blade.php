<div class="form-group row align-items-center" :class="{'has-danger': errors.has('assunto'), 'has-success': fields.assunto && fields.assunto.valid }">
    <label for="assunto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.notificaco.columns.assunto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.assunto" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('assunto'), 'form-control-success': fields.assunto && fields.assunto.valid}" id="assunto" name="assunto" placeholder="{{ trans('admin.notificaco.columns.assunto') }}">
        <div v-if="errors.has('assunto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('assunto') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descricao'), 'has-success': fields.descricao && fields.descricao.valid }">
    <label for="descricao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.notificaco.columns.descricao') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.descricao" v-validate="'required'" id="descricao" name="descricao"></textarea>
        </div>
        <div v-if="errors.has('descricao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descricao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('destinatario_id'), 'has-success': fields.destinatario_id && fields.destinatario_id.valid }">
    <label for="destinatario_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.notificaco.columns.destinatario_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.destinatario_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('destinatario_id'), 'form-control-success': fields.destinatario_id && fields.destinatario_id.valid}" id="destinatario_id" name="destinatario_id" placeholder="{{ trans('admin.notificaco.columns.destinatario_id') }}">
        <div v-if="errors.has('destinatario_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('destinatario_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('remetente_id'), 'has-success': fields.remetente_id && fields.remetente_id.valid }">
    <label for="remetente_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.notificaco.columns.remetente_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.remetente_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('remetente_id'), 'form-control-success': fields.remetente_id && fields.remetente_id.valid}" id="remetente_id" name="remetente_id" placeholder="{{ trans('admin.notificaco.columns.remetente_id') }}">
        <div v-if="errors.has('remetente_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('remetente_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tipo_id'), 'has-success': fields.tipo_id && fields.tipo_id.valid }">
    <label for="tipo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.notificaco.columns.tipo_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tipo_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tipo_id'), 'form-control-success': fields.tipo_id && fields.tipo_id.valid}" id="tipo_id" name="tipo_id" placeholder="{{ trans('admin.notificaco.columns.tipo_id') }}">
        <div v-if="errors.has('tipo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipo_id') }}</div>
    </div>
</div>


