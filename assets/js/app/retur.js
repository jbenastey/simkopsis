    $(document).ready(function () {
        let baseURL = window.location.origin+'/order-app/';

        $('#btn-retur').click(function () {
            let order  = $(this).data('order');
            let request = $(this).data('request');
            returBarang(request,order);
        });

        function returBarang(request,order) {
            let url = baseURL+'Service/returBarang';
            let data = {
              'pemesanan_id' :   order,
              'request_id' : request
            };

            $.ajax({
                url : url,
                data:data,
                async : true,
                dataType : 'json',
                type : 'post',
                success: function (response) {
                    if (response.status === 'success'){
                        window.location.reload();
                    }
                },
                error : function (response) {
                    window.location.reload();
                }
            })
        }
    });