import AppForm from '../app-components/Form/AppForm';

Vue.component('periodo-letivo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                activated:  false ,
                ano_referencia:  '' ,
                carga_horaria:  '' ,
                categorizacao_id:  '' ,
                created_by:  '' ,
                data_fim:  '' ,
                data_fim_rematricula:  '' ,
                data_inicio:  '' ,
                data_inicio_rematricula:  '' ,
                dias_letivos:  '' ,
                escola_id:  '' ,
                media:  '' ,
                nome:  '' ,
                observacao:  '' ,
                
            }
        }
    }

});