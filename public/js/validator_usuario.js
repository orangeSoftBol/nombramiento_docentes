
$(document).ready(function() {
$('#usuario-form').bootstrapValidator({

    message: 'Este valor no es valido',

    feedbackIcons: {

        valid: 'glyphicon glyphicon-ok',

        invalid: 'glyphicon glyphicon-remove',

        validating: 'glyphicon glyphicon-refresh'

    },

    fields: {

        e_mail: {

            validators: {

                notEmpty: {

                    message: 'La direccion electronica  es requerido'

                },
                regexp: {

                    regexp: /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,

                    message: 'El direccion de email debe ser valido'
                }
            }
        },
        
           password: {

            validators: {

                notEmpty: {

                    message: 'El password de la secretaria es requerido'

                },

                stringLength: {

                    min: 3,
                    max: 15,
                    message: 'El password debe tener entre 3 a 15 caracteres'

                },

                regexp: {

                    regexp: /^([a-zA-Z0-9_.+-])/,

                    message: 'El password debe ser valido'
                }

            }
        },
        nombre_usuario: {

            validators: {

                notEmpty: {

                    message: 'El nombre de la secretaria es requerido'

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
        apellido_usuario: {

            validators: {

                notEmpty: {

                    message: 'El apellido de la secretaria es requerido'

                },

                stringLength: {

                    min: 3,
                    max: 32,
                    message: 'El apellido debe tener entre 3 a 32 caracteres'

                },

                regexp: {

                    regexp: /^[a-z,A-Z,á,é,í,ó,ú,â,ê,ô,ã,õ,ç,Á,É,Í,Ó,Ú,Â,Ê,Ô,Ã,Õ,Ç,ü,ñ,Ü,Ñ,' ']+$/,

                    message: 'El apellido solo puede contener caracteres validos'

                }

            }

        },
        

        telefono_usuario: {

            validators: {

                notEmpty: {

                    message: 'El numero de telefono es requerido'

                },

                regexp: {

                    regexp: /^[0-9]{3,8}$/,

                    message: 'El numero de telefono debe ser valido'

                }
            }
        }
    }

});
});