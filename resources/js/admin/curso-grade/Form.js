import AppForm from '../app-components/Form/AppForm';

Vue.component('curso-grade-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                activated:  false ,
                bol_optativa:  false ,
                carga_horaria:  '' ,
                color:  '' ,
                curso_id:  '' ,
                descricao:  '' ,
                hora_aula:  '' ,
                nome:  '' ,
                periodo:  '' ,
                
            }
        }
    }

});