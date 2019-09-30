$(document).ready(function () {
    let baseUrl = window.location.origin+'/simkopsis/'; //development
    // let baseUrl = window.location.origin;  // production
    let saldoForm = $('input#saldo');
    let penarikanForm = $('input#penarikan');
    let jenisSimpanan = penarikanForm.data('jenis');
    let penarikanSaveBtn = $('#penarikan-save-btn');
    let penarikanAlert = $('#penarikan-alert');

    penarikanAlert.fadeOut('slow');
    penarikanSaveBtn.fadeOut('slow');

    injectAnggotaInputSearch();

    function injectAnggotaInputSearch() {
        let url = baseUrl+'Service/anggota';
        let anggotas = [];
        $.ajax({
            url:url,
            async : true,
            dataType:'json',
            cache : false,
            type: 'GET',
            success: function (response) {
                if (response.data !== null){
                    let anggota = response.data;
                    for (let i = 0; i < anggota.length ; i++) {
                        anggotas.push({
                            'id' : anggota[i].anggota_id,
                            'nama': anggota[i].anggota_nama,
                            'pekerjaan' : anggota[i].anggota_pekerjaan
                        });
                    }
                }
            },
            error : function (response) {
                console.log(response.text);
            }
        });

        var options = {
            data: anggotas,

            getValue: "nama",

            template: {
                type: "description",
                fields: {
                    description: "pekerjaan"
                }
            },
            list: {
                maxNumberOfElements: 8,
                match: {
                    enabled: true
                },
                onClickEvent: function () {
                    var id = $("#penarikan-anggota-search").getSelectedItemData().id;
                    $('#penarikan-id-anggota').val(id);
                    getSaldoAnggota(id,jenisSimpanan);
                }
            }
        };

        $("#penarikan-anggota-search").easyAutocomplete(options);
    }

    function getSaldoAnggota(id,jenis) {
        let url = baseUrl+'Service/getSaldoAnggota/';
        let data = {
            'anggota_id' : id,
            'simpanan_jenis' : jenis
        };
        $.ajax({
            url:url,
            async : true,
            data : data,
            dataType:'json',
            cache : false,
            type: 'POST',
            success: function (response) {
                let dataSaldo = response.data;
                if (dataSaldo !== null){
                    let formatSaldo = numeral(dataSaldo.saldo_total).format('Rp 0,0.00');

                    saldoForm.val('Rp '+formatSaldo);
                    penarikanForm.data('saldo',parseInt(dataSaldo.saldo_total));

                    validasiPenarikan();
                } else{
                    saldoForm.val('Belum ada saldo '+jenis);
                }
            },
            error : function (response) {
                console.log(response.text);
            }
        });

    }

    function validasiPenarikan() {
        $(document).on('input','input#penarikan', function () {
           let saldo = $(this).data('saldo');
           let penarikan = $(this).val();

           if (penarikan > saldo){
                penarikanAlert.fadeIn('slow');
                penarikanSaveBtn.fadeOut('slow');
           } else{
               penarikanAlert.fadeOut('slow');
               penarikanSaveBtn.fadeIn('slow');
           }
        });
    }



});
