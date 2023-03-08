import AppForm from '../app-components/Form/AppForm';

Vue.component('escola-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                activated:  false ,
                cep:  '' ,
                cnpj:  '' ,
                cod_municipio:  '' ,
                fone:  '' ,
                logradouro:  '' ,
                nome:  '' ,
                numero:  '' ,
                
            }
        }
    }

});