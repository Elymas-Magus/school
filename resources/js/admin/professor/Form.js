import AppForm from '../app-components/Form/AppForm';

Vue.component('professor-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                celular:  '' ,
                data_matricula:  '' ,
                data_nascimento:  '' ,
                escola_id:  '' ,
                registro:  '' ,
                telefone:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});