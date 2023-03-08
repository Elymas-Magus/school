import AppForm from '../app-components/Form/AppForm';

Vue.component('aluno-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                bol_aee:  false ,
                celular:  '' ,
                data_matricula:  '' ,
                data_nascimento:  '' ,
                email_responsavel:  '' ,
                escola_id:  '' ,
                registro:  '' ,
                telefone:  '' ,
                turma_id:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});