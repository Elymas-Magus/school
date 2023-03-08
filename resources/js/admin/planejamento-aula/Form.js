import AppForm from '../app-components/Form/AppForm';

Vue.component('planejamento-aula-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                conteudo:  '' ,
                data_fim:  '' ,
                data_inicio:  '' ,
                disciplina_id:  '' ,
                habilidades_competencias:  '' ,
                titulo:  '' ,
                
            }
        }
    }

});