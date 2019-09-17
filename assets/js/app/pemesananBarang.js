    $(document).ready(function () {
        // var baseURL = window.location.origin; // production
        var baseURL = window.location.origin+'/order-app/'; // development
        var pemesananBarangURL = baseURL+'pemesanan/tambah';
        let overStokAlert = $('.over-stok-alert');

        $('#pemesanan-barang-search').click(function () {
            $(this).select();
        });

        $(document).on('click','#pemesanan-jumlah-pesan', function () {
           $(this).select();
        });

        if (window.location.href === pemesananBarangURL || window.location.href === pemesananBarangURL+'#!') {
            injectBarangInputSearch();
            overStokAlert.fadeOut('slow');
        }

        function injectBarangInputSearch() {
            let url = baseURL+'Service/getBarang';
            let barangs = [];
            $.ajax({
                url:url,
                async : true,
                dataType:'json',
                cache : false,
                type: 'GET',
                success: function (response) {
                    if (response.barangs !== null){
                        let barang = response.barangs;
                        for (let i = 0; i < barang.length; i++) {
                            barangs.push({
                                'idBarang' : barang[i].barang_id,
                                'nama'  : barang[i].barang_nama,
                                'kategori' : barang[i].kategori_nama,
                                'idKategori' : barang[i].kategori_id,
                                'stok' : barang[i].barang_stok
                            });
                        }
                    }
                },
                error : function (response) {
                    console.log(response.text);
                }
            });

            var options = {
                data: barangs,

                getValue: "nama",

                template: {
                    type: "description",
                    fields: {
                        description: "kategori"
                    }
                },
                list: {
                    maxNumberOfElements: 8,
                    match: {
                        enabled: true
                    },
                    onClickEvent: function () {
                        let idBarang = $("#pemesanan-barang-search").getSelectedItemData().idBarang;
                        let stokBarang = $('#pemesanan-barang-search').getSelectedItemData().stok;
                        $('#pesanan-stok').val(stokBarang);
                        $('#pemesanan-jumlah-pesan').val(0);
                        $('#pemesanan-total-price').html('Rp, 000,00');
                        $('#label-pesan-total').addClass('active');
                        setBarangCardBox(idBarang);
                    }
                }
            };

            $("#pemesanan-barang-search").easyAutocomplete(options);
        }

        function setBarangCardBox(id) {
            // set value of form barang
            $('input[name="pesanan-barang-id"]').val(id);

           let url = baseURL+'Service/getbBarangByID/'+id;
            $.ajax({
                url:url,
                async : true,
                dataType:'json',
                cache : false,
                type: 'GET',
                success: function (response) {
                    if (response.barang !== null){
                        showPesananResult(response);
                    }
                },
                error : function (response) {
                    console.log(response.text);
                }
            });
        }

        function showPesananResult(response) {
            let barang = response.barang;

            $('input[name="pesanan-harga-barang"]').val(barang.barang_harga);
            let formatHarga = numeral(barang.barang_harga).format('Rp 0,0.00');
            let price = 'Rp, '+formatHarga+' per '+barang.barang_satuan;
            $('#pemesanan-barang-name').html(barang.barang_nama);
            $('#pemesanan-barang-price').html(price);
            let jumlahPesan;

            $(document).on('input','#pemesanan-jumlah-pesan',function () {
                jumlahPesan = $(this).val();
                let stokBarang = $('#pesanan-stok').val();

                if (parseInt(jumlahPesan) > parseInt(stokBarang)){
                    overStokAlert.fadeIn('slow');
                    $('#pemesanan-submit-data').fadeOut('slow');
                } else{
                    overStokAlert.fadeOut('slow');
                    $('input[name="pesanan-total-pesan"]').val(parseInt(jumlahPesan));

                    if (parseInt(jumlahPesan) !== 0 || jumlahPesan !== '' || jumlahPesan !== null){
                        let total = parseInt(jumlahPesan)*barang.barang_harga;
                        if (isNaN(total)){
                            $('#pemesanan-total-price').html('Rp, 000,00');
                        } else {
                            $('input[name="pesanan-total-harga"]').val(total);
                            $('#pemesanan-total-value').val(total);

                            let formatTotal = numeral(total).format('Rp 0,0.00');

                            $('#pemesanan-total-price').html('Rp '+formatTotal);
                            $('#pemesanan-submit-data').fadeIn('slow');
                        }
                    } else{
                        $('#pemesanan-submit-data').fadeOut('slow');
                    }
                }

            });
        }

        // on button submit clicked
        $('#pemesanan-submit-data').click(function () {
            // $('#data-pesanan').submit();
            let dataPesanan = $('#data-pesanan').serializeArray();
            submitDataPesanan(dataPesanan);

            resetFormPesan();
        });

        // on cancel submit button clicked
        $('#pemesanan-cancel-submit').click(function () {
            resetFormPesan();
        });

        function resetFormPesan() {
            overStokAlert.fadeOut('slow');
            $('#pemesanan-barang-search').val('');
            $('#label-pesan-total').removeClass('active');
            $('#pemesanan-barang-name').html('nama barang');
            $('#pemesanan-barang-price').html('Rp, 000,00');
            $('#pemesanan-total-value').val(0);
            $('#pemesanan-jumlah-pesan').val(0);
            $('#pemesanan-total-price').html('Rp, 000,00');
            $('#pemesanan-submit-data').fadeOut('slow');
        }

        function submitDataPesanan(dataPesan) {
            let url = baseURL+'Service/postPesanan';
            console.log(dataPesan);

            $.ajax({
                url:url,
                data : dataPesan,
                async : true,
                dataType:'json',
                cache : false,
                type: 'POST',
                success: function (response) {
                    if(response.insert === 'success'){
                        window.location.reload();
                    }
                },
                error : function (response) {
                    console.log(response);
                }
            });

        }

    });