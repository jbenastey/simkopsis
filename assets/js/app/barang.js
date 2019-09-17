    $(document).ready(function () {
        // var baseURL = window.location.origin; // production
        var baseURL = window.location.origin+'/order-app/'; // development
        var barangURL = baseURL+'barang';

        $('#barang-box-search').click(function () {
            $(this).select();
        });

        if (window.location.href === barangURL) {
            injectBarangInputSearch();

            $('#kategori-barang').change(function () {
                let value = $(this).val();
                console.log(value);
                if (value === 'all-category'){
                    window.location.href = baseURL+'barang';
                } else{
                    window.location.href = baseURL+'barang?kategori='+value;
                }
            });
        }else if (window.location.href.indexOf('kategori') > -1){
            injectBarangInputSearch();

            $('#kategori-barang').change(function () {
                let value = $(this).val();
                console.log(value);
                if (value === 'all-category'){
                    window.location.href = baseURL+'barang';
                } else{
                    window.location.href = baseURL+'barang?kategori='+value;
                }
            });
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
                                'idKategori' : barang[i].kategori_id
                            });
                        }
                    }
                },
                error : function (response) {
                    console.log(response.text);
                }
            });
            console.log(barangs);
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
                        let idBarang = $("#barang-box-search").getSelectedItemData().idBarang;
                        searchBarang(idBarang);
                    }
                }
            };

            $("#barang-box-search").easyAutocomplete(options);
        }

        function searchBarang(idBarang) {
           window.location.href = baseURL+'barang/'+idBarang;
        }

    });