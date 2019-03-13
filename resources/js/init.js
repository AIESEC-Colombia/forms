import {validatedFields} from "./validated";
import swal from 'sweetalert';

const next = $(".next"),
    previous = $('.previous'),
    submit = $('#submit'),
    cancel = $('#cancel'),
    terms = $("#terms"),
    btnTerm = $("#btn-term"),
    formStep = $("#form-step");

next.on('click', (e) => {
    let current = $(e.currentTarget).parents('.step'),
        stepNumber = current.data('step'),
        nextStep = formStep.find(`[data-step="${++stepNumber}"]`);
    initStep(nextStep);
    current.hide();
    nextStep.show();

});

previous.on('click', (e) => {
    let current = $(e.currentTarget).parents('.step'),
        stepNumber = current.data('step'),
        previous = formStep.find(`[data-step="${--stepNumber}"]`);
    initStep(previous);
    current.hide();
    previous.show();
});

cancel.click((e) => {
    window.location.reload();
});

submit.click((e) => {

    if (!terms.is(':checked')) {
        return swal('Debe aceptar los terminos y condiciones', '', 'info');
    }

    let data = {};
    formStep.find('input,textarea,checkbox,radio').each((index, value) => {
        data[`${value.name}`] = value.value
    });

    formStep.find('select').each((index, value) => {
        data[`${value.name}`] = value.value;
        data[`${value.name}_text`] = $(`#${value.id} option:selected`).text();
    });

    data['isVoluntary'] = $(e.currentTarget).data('voluntary') || null;
    sendAjax(data);
});

btnTerm.click(e => {
    e.preventDefault();
    window.open("http://aieseccolombia.org/wp-content/uploads/2017/02/AVISO-DE-PRIVACIDAD-1.pdf");
});

function sendAjax(data) {
    $.post('store', data)
        .then(({response}) => {
            if (response) {
                return swal('Registro creado con exito', '', 'success');
            } else {
                return swal('hemos tenido un problema con la conexión, por favor vuelta ha interlo', '', 'error');
            }

        }).catch(e => {
        return swal('hemos tenido un problema con la conexión, por favor vuelta ha interlo', '', 'error');
    })
}

function initStep(currentStep) {
    currentStep.find(`[data-validated]`).each((index, value) => {
        if (!$(value).val()) {
            $(value).attr('data-invalid', false);
            let btnCurrent = currentStep.find('.next');
            let btnSubmit = currentStep.find('#submit');
            btnCurrent.attr('disabled', true);
            btnSubmit.attr('disabled', true);
        }
    });

    validatedCurrentStep(currentStep);
}

function validatedCurrentStep(currentStep) {
    currentStep.find(`[data-validated]`).each((index, value) => {
        let field = $(value),
            validateRules = field.data('validated').split(',') || [];
        field.on('change blur', () => {
            let valid = validatedFields(field, validateRules, currentStep);
            currentStep.find('.next').attr('disabled', valid);
            currentStep.find('#submit').attr('disabled', valid);
        });
    })
}

initStep(formStep.find('[data-step="0"]'));