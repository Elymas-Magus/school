import AppForm from '../app-components/Form/AppForm';

Vue.component('aula-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                bol_online:  false ,
                categorizacao_item_id:  '' ,
                data_fim:  '' ,
                data_inicio:  '' ,
                disciplina_id:  '' ,
                escola_id:  '' ,
                link_transmissao:  '' ,
                observacoes:  '' ,
                periodo_letivo_id:  '' ,
                planejamento_id:  '' ,
                plataforma_id:  '' ,
                professor_id:  '' ,
                replica_id:  '' ,
                titulo:  '' ,
                
            }
        }
    }

});