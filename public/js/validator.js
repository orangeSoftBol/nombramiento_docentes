/**
 * Created by Cristhian on 16/11/2016.
 */
$(document).ready(function() {
$('#docente-form').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'glyphicon glyphicon-ok',

        invalid: 'glyphicon glyphicon-remove',

        validating: 'glyphicon glyphicon-refresh'

    },

    fields: {

        nombre: {

            validators: {

                notEmpty: {

                    message: 'El nombre de docente es requerido'

                },

                stringLength: {

                    min: 3,
                    max: 32,
                    message: 'El nombre debe tener entre 3 a 32 caracteres'

                },

                regexp: {

                    regexp: /^[a-z,A-Z,á,é,í,ó,ú,â,ê,ô,ã,õ,ç,Á,É,Í,Ó,Ú,Â,Ê,Ô,Ã,Õ,Ç,ü,ñ,Ü,Ñ,' ']+$/,

                    message: 'El nombre solo puede contener caracteres validos'

                }

            }

        },

        apellido_paterno: {

            validators: {

                notEmpty: {

                    message: 'El apellido paterno es requerido'

                },

                stringLength: {

                    min: 3,
                    max: 32,
                    message: 'El apellido paterno debe tener entre 3 a 32 caracteres'

                },

                regexp: {

                    regexp: /^[a-z,A-Z,á,é,í,ó,ú,â,ê,ô,ã,õ,ç,Á,É,Í,Ó,Ú,Â,Ê,Ô,Ã,Õ,Ç,ü,ñ,Ü,Ñ,' ']+$/,

                    message: 'El apellido paterno solo puede contener caracteres validos'

                }
            }

        },

        apellido_materno: {

            validators: {

                notEmpty: {

                    message: 'El apellido materno es requerido'

                },

                stringLength: {

                    min: 3,
                    max: 32,
                    message: 'El apellido paterno debe tener entre 3 a 32 caracteres'

                },

                regexp: {

                    regexp: /^[a-z,A-Z,á,é,í,ó,ú,â,ê,ô,ã,õ,ç,Á,É,Í,Ó,Ú,Â,Ê,Ô,Ã,Õ,Ç,ü,ñ,Ü,Ñ,' ']+$/,

                    message: 'El apellido paterno solo puede contener caracteres validos'

                }
            }
        },
        
        ci: {

            validators: {

                notEmpty: {

                    message: 'El documento de identidad es requerido'

                },

                regexp: {

                    regexp: /^[0-9]{3,10}$/,

                    message: 'El documento de identidad debe ser valido'

                }
            }
        }
    }

});
});
