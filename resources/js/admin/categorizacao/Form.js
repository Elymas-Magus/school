import AppForm from '../app-components/Form/AppForm';

Vue.component('categorizacao-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                categorizacao:  '' ,
                
            }
        }
    }

});