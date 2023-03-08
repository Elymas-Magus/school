import AppForm from '../app-components/Form/AppForm';

Vue.component('disciplina-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                activated:  false ,
                carga_horaria:  '' ,
                curso_grade_id:  '' ,
                descricao:  '' ,
                hora_aula:  '' ,
                nome:  '' ,
                periodo_letivo_id:  '' ,
                professor_id:  '' ,
                turma_id:  '' ,
                
            }
        }
    }

});