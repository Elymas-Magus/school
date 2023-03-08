import AppForm from '../app-components/Form/AppForm';

Vue.component('categorizacao-config-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                categorizacao_item_id:  '' ,
                data_fim:  '' ,
                data_inicio:  '' ,
                nota_total:  '' ,
                periodo_letivo_id:  '' ,
                
            }
        }
    }

});