<div class="form-group row align-items-center" :class="{'has-danger': errors.has('conteudo'), 'has-success': fields.conteudo && fields.conteudo.valid }">
    <label for="conteudo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.planejamento-aula.columns.conteudo') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.conteudo" v-validate="''" id="conteudo" name="conteudo"></textarea>
        </div>
        <div v-if="errors.has('conteudo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('conteudo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_fim'), 'has-success': fields.data_fim && fields.data_fim.valid }">
    <label for="data_fim" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.planejamento-aula.columns.data_fim') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_fim" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_fim'), 'form-control-success': fields.data_fim && fields.data_fim.valid}" id="data_fim" name="data_fim" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_fim')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_fim') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_inicio'), 'has-success': fields.data_inicio && fields.data_inicio.valid }">
    <label for="data_inicio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.planejamento-aula.columns.data_inicio') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_inicio" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_inicio'), 'form-control-success': fields.data_inicio && fields.data_inicio.valid}" id="data_inicio" name="data_inicio" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data_inicio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_inicio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('disciplina_id'), 'has-success': fields.disciplina_id && fields.disciplina_id.valid }">
    <label for="disciplina_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.planejamento-aula.columns.disciplina_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.disciplina_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('disciplina_id'), 'form-control-success': fields.disciplina_id && fields.disciplina_id.valid}" id="disciplina_id" name="disciplina_id" placeholder="{{ trans('admin.planejamento-aula.columns.disciplina_id') }}">
        <div v-if="errors.has('disciplina_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('disciplina_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('habilidades_competencias'), 'has-success': fields.habilidades_competencias && fields.habilidades_competencias.valid }">
    <label for="habilidades_competencias" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.planejamento-aula.columns.habilidades_competencias') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.habilidades_competencias" v-validate="''" id="habilidades_competencias" name="habilidades_competencias"></textarea>
        </div>
        <div v-if="errors.has('habilidades_competencias')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('habilidades_competencias') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('titulo'), 'has-success': fields.titulo && fields.titulo.valid }">
    <label for="titulo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.planejamento-aula.columns.titulo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.titulo" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('titulo'), 'form-control-success': fields.titulo && fields.titulo.valid}" id="titulo" name="titulo" placeholder="{{ trans('admin.planejamento-aula.columns.titulo') }}">
        <div v-if="errors.has('titulo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('titulo') }}</div>
    </div>
</div>


