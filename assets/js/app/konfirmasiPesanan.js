    $(document).ready(function () {
        let baseURL = window.location.origin+'/order-app/';
        let updatePesanan = [];

        let pesanan = $('.collection-item.pesanan-list');
       $('#btn-konfirmasi-pesanan').click(function () {
           pesanan.each(function () {
               let idPesanan = $(this).attr('id');
              konfirmasiPesanan(idPesanan);
           });
           let error = $.inArray('error',updatePesanan);
           if (error > -1){
               console.log('ada error');
           } else{
               let idRequest = $(this).data('request');
               konfirmasiPermohonan(idRequest);
           }
       });

       function konfirmasiPesanan(idPesanan) {
           let url = baseURL+'Service/konfirmasiPesanan/'+idPesanan;
           let data = {
               'id-pesanan' : idPesanan
           };
           $.ajax({
               url:url,
               data : data,
               async : true,
               dataType:'json',
               cache : false,
               type: 'POST',
               success: function (response) {
                   updatePesanan.push(response.status);
               },
               error : function (response) {
                   console.log(response);
               }
           });
       }

       function konfirmasiPermohonan(idRequest) {
           let url = baseURL+'Service/konfirmasiPermohonan/'+idRequest;
           $.ajax({
               url:url,
               async : true,
               dataType:'json',
               cache : false,
               type: 'GET',
               success: function (response) {
                   if (response.status !== 'error'){
                       window.location.href = baseURL+'pemesanan/permohonan';
                   } else{
                       console.log('error');
                   }
               },
               error : function (response) {
                   console.log(response);
               }
           });
       }
    });