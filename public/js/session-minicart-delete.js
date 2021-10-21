$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.ajax_minicartclose', function (e) {
        $('#minicart').removeClass('inside');
    });

    $(document).on('click', '.cart-delete', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        //alert(id)

        $.ajax({
            method: 'get',
            url: '../../delete-cartajax/' + id,
            data: { id: id },
            success: function (data) {

                //$('#minicart').removeClass('inside');
                $("#minicart").html(data.minicart);
                $(document).ready(function () {
                    let count = $('.header-cart a[class="cart-active"]').find('.pro-count.purple')[0];
                    let cartCount = $(count).text();
                    $(count).text(data.cartCount);
                });

                if (data.error) {
                    toastr.error(data.error);
                }
                //alert(data.cartCount);

                //console.log(data.flag);
                //console.log(data.proSize);


                console.log(data.cartCount);

                //             $("#minicart").html(data.minicart);
            },
            error: function (error) {
                console.log(error);

            }
        });
        //e.preventDefault();

    });

});

