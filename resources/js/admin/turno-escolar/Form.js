import AppForm from '../app-components/Form/AppForm';

Vue.component('turno-escolar-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                descricao:  '' ,
                titulo:  '' ,
                
            }
        }
    }

});