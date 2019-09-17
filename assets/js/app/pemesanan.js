    $(document).ready(function () {
        // var baseURL = window.location.origin; // production
        var baseURL = window.location.origin+'/order-app/'; // development
        var pemesananURL = baseURL+'pemesanan/tambah';

        if (window.location.href === pemesananURL || window.location.href === pemesananURL+'#!' || window.location.href === pemesananURL+'#' ){
            injectPelangganInputSearch();
            validatePelangganSelected();
            $("#pemesanan-pelanggan-search").click(function () {
                $(this).select();
            });

            $('#permohonan-cancel-button').click(function () {
                $('#pesan').val('');
            });
        }


        function injectPelangganInputSearch() {
            let url = baseURL+'Service/getPelanggan';
            let pelanggans = [];
            $.ajax({
                url:url,
                async : true,
                dataType:'json',
                cache : false,
                type: 'GET',
                success: function (response) {
                    for (let i = 0; i < response.length ; i++) {
                        pelanggans.push({
                            'id' : response[i].pelanggan_id,
                            'nama': response[i].pelanggan_nama,
                            'alamat' : response[i].pelanggan_alamat
                        });
                    }
                },
                error : function (response) {
                    console.log(response.text);
                }
            });

            var options = {
                data: pelanggans,

                getValue: "nama",

                template: {
                    type: "description",
                    fields: {
                        description: "alamat"
                    }
                },
                list: {
                    maxNumberOfElements: 8,
                    match: {
                        enabled: true
                    },
                    onClickEvent: function () {
                        let id = $("#pemesanan-pelanggan-search").getSelectedItemData().id;
                        $('input[name="pesanan-pelanggan-id"]').val(id);
                        validatePelangganSelected();
                        showPelangganCardBox(id);
                        showPesananList(id);
                    }
                }
            };

            $("#pemesanan-pelanggan-search").easyAutocomplete(options);
        }


        // showing detail pelanggan card box on top of page
        function showPelangganCardBox(id) {
            // set form data

            let url = baseURL+'Service/getPelangganByID/'+id;
            $.ajax({
                url:url,
                async : true,
                dataType:'json',
                cache : false,
                type: 'GET',
                success: function (response) {
                    console.log(response);
                    if (response.pelanggan !== null){
                        let pelanggan = response.pelanggan;
                        $('input[name="pesanan-request-id"]').val(response.request_id);
                        $('#permohonan-request-id').val(response.request_id);
                        $('#pemesanan-pelanggan-name').html(pelanggan.pelanggan_nama);
                        $('#pemesanan-pelanggan-place').html(pelanggan.pelanggan_alamat);
                    }
                },
                error : function (response) {
                    console.log(response.pelanggan.text);
                }
            });
        }
        
        // validate if pelanggan data exists or selected
        function validatePelangganSelected() {
            let pelangganID = $('input[name="pesanan-pelanggan-id"]').val();
            if (pelangganID !== ''){
                $('button[name="button-add-pesanan"]').attr('disabled',false);
            } else {
                $('button[name="button-add-pesanan"]').attr('disabled',true);
            }
        }

        function showPesananList(id) {
            let url = baseURL+'Service/getPesananByPelanggan/'+id;
            $.ajax({
                url:url,
                async : true,
                dataType:'json',
                cache : false,
                type: 'GET',
                success: function (response) {
                    if (response.data !== null){
                        $('#pesanan-list-container>li.collection-item').remove();
                        $('#permohonan-pelanggan-id').val(id);
                        validateSendBtn(id);
                        injectPesananListView(response.data);
                    } else {
                        $('#pesanan-send-btn').addClass('disabled');
                        $('#pesanan-send-btn').data('target','#!');
                        $('#pesanan-send-btn').html('kirim pesanan <i class="mdi-content-send"></i>');
                        showEmptyListView(true);
                    }
                },
                error : function (response) {
                    console.log(response);
                }
            });
        }

        function injectPesananListView(data) {
            let lists = '';
            for (let i = 0; i < data.length; i++) {
                let formatTotal = numeral(data[i].pemesanan_total).format('Rp 0,0.00');
                let formatHarga = numeral(data[i].barang_harga).format('Rp 0,0.00');
                lists += '<li class="collection-item avatar '+data[i].pemesanan_id+'">'+
                    '<img src="'+(baseURL+'assets/images/svg/barang.svg')+'" alt="" class="circle">'+
                    '<span class="title teal-text text-darken-1">'+data[i].barang_nama+'</span>'+
                    '<p class="grey-text text-lighten-2-1"><i class="mdi-action-shopping-cart"></i> Rp, '+formatHarga+' per '+data[i].barang_satuan+'  </p>'+
                    '<br>'+
                    '<p class="grey-text text-lighten-2-1">Jumlah Pesan : '+data[i].pemesanan_jumlah+' '+data[i].barang_satuan+'</p>'+
                    '<p class="grey-text text-lighten-2-1">Total Tagihan : Rp, '+formatTotal+'  </p>'+
                    '<a href="'+data[i].pemesanan_id+'"  class="secondary-content red-text text-darken-1" ' +
                        'id="pesanan-remove-list-btn" data-pesan="'+data[i].pemesanan_jumlah+'" data-barang="'+data[i].barang_id+'">' +
                            '<i class="mdi-action-delete"></i>' +
                    '</a>'+
                '</li>';
            }
            showEmptyListView(false);
            $('#pesanan-list-container').append(lists);
        }

        // remove pemesanan data from list
        $(document).on('click','#pesanan-remove-list-btn',function (e) {
            e.preventDefault();
            let pemesananID = $(this).attr('href');
            let pemesananJumlah = $(this).data('pesan');
            let barangID = $(this).data('barang');
            let listComponent = $('#pesanan-list-container>li.collection-item.'+pemesananID+'');

            removePesanan(pemesananID,barangID,pemesananJumlah,listComponent);
        });

        function removePesanan(id,barang,jumlah,list) {
            let url = baseURL+'Service/removePesanan/'+id;
            let data = {
                'barang-id' : barang,
                'jumlah-pesanan' :   jumlah
            };
            console.log(data);

            $.ajax({
                url:url,
                data : data,
                async : true,
                dataType:'json',
                cache : false,
                type: 'POST',
                success: function (response) {
                    if (response.remove === 'success'){
                        list.remove();
                    }
                },
                error : function (response) {
                    console.log(response);
                }
            });
        }

        // show alert when list is empty
        function showEmptyListView(view) {
            if (view !== true) {
                $('#empty-list-msg').fadeOut('slow');
            } else {
                $('#pesanan-list-container>li.collection-item').remove();
                $('#empty-list-msg').fadeIn('slow');
            }
        }

        // validate send btn
        function validateSendBtn(idPelanggan) {
            let url = baseURL+'Service/cekRequestPesan/'+idPelanggan;

            $.ajax({
                url:url,
                async : true,
                dataType:'json',
                cache : false,
                type: 'GET',
                success: function (response) {
                    if (response.data !== null){
                        $('#pesanan-send-btn').addClass('disabled');
                        $('#pesanan-send-btn').data('target','#!');
                        $('#pesanan-send-btn').html('permohonan telah dikirim');
                    } else {
                        $('#pesanan-send-btn').removeClass('disabled');
                        $('#pesanan-send-btn').data('target','modal-konfirmasi-kirim');
                        $('#pesanan-send-btn').html('kirim pesanan <i class="mdi-content-send"></i>');
                    }
                },
                error : function (response) {
                    console.log(response);
                }
            });
        }


    });