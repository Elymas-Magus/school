import AppForm from '../app-components/Form/AppForm';

Vue.component('curso-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                activated:  false ,
                descricao:  '' ,
                escola_id:  '' ,
                nome:  '' ,
                qtd_vagas_alunos:  '' ,
                qtd_vagas_alunos_aee:  '' ,
                total_periodos:  '' ,
                
            }
        }
    }

});