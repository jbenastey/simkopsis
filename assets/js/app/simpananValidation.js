$(document).ready(function () {

    /*
    * validasi jumlah minimal setoran berdasarkan aturan pada data attribut
    * */
    let tblSimpan = $('#simpanan-simpan-button');

    // set tblSimpan default value is hide before validation is valid
    tblSimpan.fadeOut('slow');

    $(document).on('input','.simpanan-input', function () {
        let minimalInput = $(this).data('minimal');
        let setoran = parseInt($(this).val());

        if (setoran >= minimalInput){
            tblSimpan.fadeIn('slow');
        } else {
            tblSimpan.fadeOut('slow');
        }
    });

});