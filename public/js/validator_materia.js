
$(document).ready(function() {
$('#materia-form').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'glyphicon glyphicon-ok',

        invalid: 'glyphicon glyphicon-remove',

        validating: 'glyphicon glyphicon-refresh'

    },

    fields: {


       id_materia: {

            validators: {

                notEmpty: {

                    message: 'El id de materia es requerido'

                },

                stringLength: {

                    min: 3,
                    max: 7,
                    message: 'El id debe tener entre 3 a 7 caracteres'

                },

                regexp: {

                    regexp: /^([a-zA-Z0-9_.+-])/,

                    message: 'El id debe ser valido'
                }

            }

        },
            
        nombre_materia: {

            validators: {

                notEmpty: {

                    message: 'El nombre de la materia es requerido'

                },

                stringLength: {

                    min: 3,
                    max: 32,
                    message: 'El nombre debe tener entre 3 a 32 caracteres'

                },

                regexp: {

                    regexp: /^[a-z,A-Z,á,é,í,ó,ú,â,ê,ô,ã,õ,ç,Á,É,Í,Ó,Ú,Â,Ê,Ô,Ã,Õ,Ç,ü,ñ,Ü,Ñ,' ']+$/,

                    message: 'El nombre de la materia solo puede contener caracteres validos'

                }

            }

        },

        sigla_materia: {

            validators: {

                notEmpty: {

                    message: 'La sigla de identidad es requerido'

                },

                regexp: {

                    regexp: /^[0-9]{3,10}$/,

                    message: 'La sigla de identidad debe ser valido'

                }
            }
        }
    }

});
});
