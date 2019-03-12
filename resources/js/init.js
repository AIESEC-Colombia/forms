import {validatedFields} from "./validated";

const step = $(".step"),
    next = $(".next"),
    previous = $('.previous'),
    submit = $('#submit'),
    cancel = $('#cancel'),
    terms = $("#terms"),
    validated = $(".validated"),
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

submit.click(() => {

    if(!terms.is(':checked')){
        return alert('acepte los terminos y condiciones')
    }

    let data = {};
    formStep.find('input,textarea,checkbox,radio').each((index, value) => {
        data[`${value.name}`] = value.value
    });

    formStep.find('select').each((index, value) => {
        data[`${value.name}`] = value.value;
        data[`${value.name}_text`] = $(`#${value.id} option:selected`).text();
    });
    console.log(data);
});

btnTerm.click(e => {
    e.preventDefault();
    alert('redireccionar a los terminos y condiciones')
})

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