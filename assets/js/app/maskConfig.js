$(document).ready(function () {

    $('.rupiah-input').mask('000.000.000,00', {reverse:true});

    $(document).on('input','.rupiah-input',function () {
       console.log($(this).val());
    });
});