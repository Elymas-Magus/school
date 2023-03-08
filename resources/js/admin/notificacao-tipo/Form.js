import AppForm from '../app-components/Form/AppForm';

Vue.component('notificacao-tipo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                tipo:  '' ,
                
            }
        }
    }

});