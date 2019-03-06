import swal from 'sweetalert';

$.ajaxSetup({
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



const form = $("#form"),
    btnRegister = $("#btn-register"),
    btnTerm = $("#btn-term"),
    errorLists = $("#errorLists"),
    alertError = $("#alert-messages");

console.log(alertError.offset());
btnTerm.click(e => {
    e.preventDefault();
    window.open("http://aieseccolombia.org/wp-content/uploads/2017/02/AVISO-DE-PRIVACIDAD-1.pdf");
});

btnRegister.click(e => {
    alertError.hide();
    errorLists.empty();
    let data = {};
    form.find('.form-validate').each((index, item) => {
        let [field] = $(item).find('[name]');

        if (field.name === 'university') {
            data['university_name'] = $("#university option:selected").text();
        }

        if (field.name === 'career') {
            data['career_name'] = $("#career option:selected").text();
        }

        if (field.name === 'terms') {
            field.value = $("#terms").is(':checked') ? 1 : null
        }

        data[field.name] = field.value
    });

    $.post('store', data)
        .then(({response}) => {

            if(response){
                //vemos que se hace jeje
            }

        }).catch(({status, responseText}) => {

        if (status === 422) {
            let dataJson = $.parseJSON(responseText);
            $.each(dataJson.errors, function (key, value) {
                errorLists.append(`<li>${value}</li>`);
                alertError.show();
                $("html, body").delay(100).animate({ scrollTop: alertError.offset().top }, 50);

            });

        } else {
            swal('Error', 'algo salio mal, por favor vuelva a intenterlo', 'error');
        }
    })

});




