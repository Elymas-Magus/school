import AppForm from '../app-components/Form/AppForm';

Vue.component('plataforma-transmissao-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                descricao:  '' ,
                plataforma:  '' ,
                site:  '' ,
                
            }
        }
    }

});