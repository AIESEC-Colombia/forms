//expresiones regulares
const numeric = /^\d+$/,
    email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,
    password = /^(?=.*\d)(?=.*[a-zA-Z]).{8,16}$/;

function activatedNextAndSubmit(currentStep) {
    let errors = false;
    currentStep.find(`[data-validated]`).each((index, value) => {
        if (!$(value).data('invalid')) {
            errors = false;
            return false;
        } else {
            errors = true;
        }
    });

    return !errors;
}

function addErrors(field, message) {
    field.addClass('is-invalid');
    field.siblings().find('strong').html(`${field.attr('placeholder')} ${message}`);
    $(field).data('invalid', false);
}

function removeErrors(field) {
    $(field).data('invalid', true);
    field.removeClass('is-invalid');
}

export function validatedFields(field, validateRules, currentStep) {
    $(validateRules).each((index, value) => {
        switch (value) {
            case 'required':
                if (!field.val()) {
                    addErrors(field, 'es requerido.');
                    return false;
                } else {
                    removeErrors(field);
                }
                break;
            case 'numeric':
                if (!numeric.test(field.val())) {
                    addErrors(field, 'no es un número valido.');
                    return false;
                } else {
                    removeErrors(field);
                }
                break;
            case 'min':
                let min = +field.data('min');
                if (field.val().length < min) {
                    addErrors(field, `debe ser mayor a ${min}`);
                    return false;
                } else {
                    removeErrors(field);
                }
                break;
            case 'max':
                let max = +field.data('max');
                if (field.val().length > max) {
                    addErrors(field, `debe ser menor a ${max}`);
                    return false;
                } else {
                    removeErrors(field);
                }
                break;
            case 'email':
                if (!email.test(field.val())) {
                    addErrors(field, 'no es un correo valido.');
                    return false;
                } else {
                    removeErrors(field);
                }
                break;
            case 'password':
                if (!password.test(field.val())) {
                    addErrors(field, 'la contraseña debe tener numeros, letras mayusculas,minusculas y debe estar entre 8 y 16 caracteres');
                    return false;
                } else {
                    removeErrors(field);
                }
                break;
            case 'confirm':
                let compared = $(`#${field.data('confirm')}`);
                if (field.val() !== compared.val()) {
                    addErrors(field, 'la contraseña no coincide.');
                    return false;
                } else {
                    removeErrors(field);
                }
                break;
        }
    });

    return activatedNextAndSubmit(currentStep);
}