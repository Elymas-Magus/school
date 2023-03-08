import AppForm from '../app-components/Form/AppForm';

Vue.component('categorizacao-item-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                categorizacao_id:  '' ,
                item:  '' ,
                
            }
        }
    }

});