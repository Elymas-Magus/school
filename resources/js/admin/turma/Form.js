import AppForm from '../app-components/Form/AppForm';

Vue.component('turma-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                activated:  false ,
                bol_aee:  false ,
                escola_id:  '' ,
                nome:  '' ,
                periodo_letivo_id:  '' ,
                qtd_vagas_alunos:  '' ,
                qtd_vagas_alunos_aee:  '' ,
                turno_escolar_id:  '' ,
                
            }
        }
    }

});