    $(document).ready(function () {
        let baseURL = window.location.origin+'/simkopsis';
        // var baseURL = window.location.origin;// deploy
        let material = baseURL+'/assets/css/materialize.css';
        let materialMin = baseURL+'/assets/css/plugins/materialize.min.css';
        let style = baseURL+'/assets/css/style.css';

        $(document).on('click','#btn-cetak-surat-keluar',function () {
           $('#surat-keluar-barang').printThis({
               importCSS:true,
               importStyle:true,
               loadCSS: [material,style]
           });
        });

    });