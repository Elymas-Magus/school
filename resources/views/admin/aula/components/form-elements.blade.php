<div class="form-check row" :class="{'has-danger': errors.has('bol_online'), 'has-success': fields.bol_online && fields.bol_online.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="bol_online" type="checkbox" v-model="form.bol_online" v-validate="''" data-vv-name="bol_online"  name="bol_online_fake_element">
        <label class="form-check-label" for="bol_online">
            {{ trans('admin.aula.columns.bol_online') }}
        </label>
        <input type="hidden" name="bol_online" :value="form.bol_online">
        <div v-if="errors.has('bol_online')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bol_online') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('categorizacao_item_id'), 'has-success': fields.categorizacao_item_id && fields.categorizacao_item_id.valid }">
    <label for="categorizacao_item_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aula.columns.categorizacao_item_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.categorizacao_item_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('categorizacao_item_id'), 'form-control-success': fields.categorizacao_item_id && fields.categorizacao_item_id.valid}" id="categorizacao_item_id" name="categorizacao_item_id" placeholder="{{ trans('admin.aula.columns.categorizacao_item_id') }}">
        <div v-if="errors.has('categorizacao_item_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('categorizacao_item_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_fim'), 'has-success': fields.data_fim && fields.data_fim.valid }">
    <label for="data_fim" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aula.columns.data_fim') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_fim" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_fim'), 'form-control-success': fields.data_fim && fields.data_fim.valid}" id="data_fim" name="data_fim" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_fim')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_fim') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_inicio'), 'has-success': fields.data_inicio && fields.data_inicio.valid }">
    <label for="data_inicio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aula.columns.data_inicio') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_inicio" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_inicio'), 'form-control-success': fields.data_inicio && fields.data_inicio.valid}" id="data_inicio" name="data_inicio" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_inicio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_inicio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('disciplina_id'), 'has-success': fields.disciplina_id && fields.disciplina_id.valid }">
    <label for="disciplina_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aula.columns.disciplina_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.disciplina_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('disciplina_id'), 'form-control-success': fields.disciplina_id && fields.disciplina_id.valid}" id="disciplina_id" name="disciplina_id" placeholder="{{ trans('admin.aula.columns.disciplina_id') }}">
        <div v-if="errors.has('disciplina_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('disciplina_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('escola_id'), 'has-success': fields.escola_id && fields.escola_id.valid }">
    <label for="escola_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aula.columns.escola_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.escola_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('escola_id'), 'form-control-success': fields.escola_id && fields.escola_id.valid}" id="escola_id" name="escola_id" placeholder="{{ trans('admin.aula.columns.escola_id') }}">
        <div v-if="errors.has('escola_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('escola_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('link_transmissao'), 'has-success': fields.link_transmissao && fields.link_transmissao.valid }">
    <label for="link_transmissao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aula.columns.link_transmissao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.link_transmissao" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('link_transmissao'), 'form-control-success': fields.link_transmissao && fields.link_transmissao.valid}" id="link_transmissao" name="link_transmissao" placeholder="{{ trans('admin.aula.columns.link_transmissao') }}">
        <div v-if="errors.has('link_transmissao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('link_transmissao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('observacoes'), 'has-success': fields.observacoes && fields.observacoes.valid }">
    <label for="observacoes" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aula.columns.observacoes') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.observacoes" v-validate="''" id="observacoes" name="observacoes"></textarea>
        </div>
        <div v-if="errors.has('observacoes')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('observacoes') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('periodo_letivo_id'), 'has-success': fields.periodo_letivo_id && fields.periodo_letivo_id.valid }">
    <label for="periodo_letivo_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aula.columns.periodo_letivo_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.periodo_letivo_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('periodo_letivo_id'), 'form-control-success': fields.periodo_letivo_id && fields.periodo_letivo_id.valid}" id="periodo_letivo_id" name="periodo_letivo_id" placeholder="{{ trans('admin.aula.columns.periodo_letivo_id') }}">
        <div v-if="errors.has('periodo_letivo_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('periodo_letivo_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('planejamento_id'), 'has-success': fields.planejamento_id && fields.planejamento_id.valid }">
    <label for="planejamento_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aula.columns.planejamento_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.planejamento_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('planejamento_id'), 'form-control-success': fields.planejamento_id && fields.planejamento_id.valid}" id="planejamento_id" name="planejamento_id" placeholder="{{ trans('admin.aula.columns.planejamento_id') }}">
        <div v-if="errors.has('planejamento_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('planejamento_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('plataforma_id'), 'has-success': fields.plataforma_id && fields.plataforma_id.valid }">
    <label for="plataforma_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aula.columns.plataforma_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.plataforma_id" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('plataforma_id'), 'form-control-success': fields.plataforma_id && fields.plataforma_id.valid}" id="plataforma_id" name="plataforma_id" placeholder="{{ trans('admin.aula.columns.plataforma_id') }}">
        <div v-if="errors.has('plataforma_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('plataforma_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('professor_id'), 'has-success': fields.professor_id && fields.professor_id.valid }">
    <label for="professor_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aula.columns.professor_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.professor_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('professor_id'), 'form-control-success': fields.professor_id && fields.professor_id.valid}" id="professor_id" name="professor_id" placeholder="{{ trans('admin.aula.columns.professor_id') }}">
        <div v-if="errors.has('professor_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('professor_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('replica_id'), 'has-success': fields.replica_id && fields.replica_id.valid }">
    <label for="replica_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aula.columns.replica_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.replica_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('replica_id'), 'form-control-success': fields.replica_id && fields.replica_id.valid}" id="replica_id" name="replica_id" placeholder="{{ trans('admin.aula.columns.replica_id') }}">
        <div v-if="errors.has('replica_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('replica_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('titulo'), 'has-success': fields.titulo && fields.titulo.valid }">
    <label for="titulo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.aula.columns.titulo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.titulo" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('titulo'), 'form-control-success': fields.titulo && fields.titulo.valid}" id="titulo" name="titulo" placeholder="{{ trans('admin.aula.columns.titulo') }}">
        <div v-if="errors.has('titulo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('titulo') }}</div>
    </div>
</div>


