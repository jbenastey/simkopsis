    $(document).ready(function () {
        let baseURL = window.location.origin+'/order-app/';
        let cancels = [];

        let pesanan = $('.collection-item.pesanan-list');
       $('#btn-cancel-pesanan').click(function () {
           pesanan.each(function () {
               let idPesanan = $(this).attr('id');
              cancelPesanan(idPesanan);
           });
           let error = $.inArray('error',cancels);
           if (error > -1){
               console.log('ada error');
           } else{
               let idRequest = $(this).data('request');
               deletePermohonan(idRequest);
           }
       });

       function cancelPesanan(idPesanan) {
           console.log(idPesanan);
           let url = baseURL+'Service/cancelPesanan/'+idPesanan;
           $.ajax({
               url:url,
               async : true,
               dataType:'json',
               cache : false,
               type: 'POST',
               success: function (response) {
                   cancels.push(response.status);
               },
               error : function (response) {
                   console.log(response);
               }
           });
       }

       function deletePermohonan(idRequest) {
           let url = baseURL+'Service/deletePermohonan/'+idRequest;
           $.ajax({
               url:url,
               async : true,
               dataType:'json',
               cache : false,
               type: 'GET',
               success: function (response) {
                   if (response.status !== 'error'){
                       window.location.href = baseURL+'sales/dashboard';
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