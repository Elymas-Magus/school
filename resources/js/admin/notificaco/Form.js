import AppForm from '../app-components/Form/AppForm';

Vue.component('notificaco-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                assunto:  '' ,
                descricao:  '' ,
                destinatario_id:  '' ,
                remetente_id:  '' ,
                tipo_id:  '' ,
                
            }
        }
    }

});