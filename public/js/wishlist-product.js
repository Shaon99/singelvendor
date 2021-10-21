$(document).ready(function () {
  

    $(document).on('click', '.addTowishlist', function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');

        $.ajax({
            method: 'get',
            url: '/add-to-wishlist/' + id,
            data: { id: id },
            success: function (data) {

                if (data.success) {
                    toastr.success(data.success);
                }else{
                    if(data.error) 
                        toastr.error(data.error);
                    
                }
                
                if (data.redirect) {
                    // data.redirect contains the string URL to redirect to
                    toastr.warning(data.redirect);
                }

                $(document).ready(function () {
                    let count = $('.wishlistcounter').find('.pro-count.count')[0];

                    let cartCount = $(count).text();
                    $(count).text(data.cartCount);
                });
                
            },
            error: function (error) {
                console.log(error);

            }
        });
     

    });

});



    //Delete  Ajax
    $(document).ready(function(){
            toastr.options = {
            "closeButton": true,
            "newestOnTop": true,
            "positionClass": "toast-top-right"
            };
        });


    $(document).ready(function () {
    $(document).on('click', '.deleteBtn', function (e) {
        e.preventDefault();
        let id = $(this).attr('data-id');
        let tableRow = $(this).parent().parent();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
     
                $.ajax({
                    type: 'DELETE',
                    url: `delete-wishlist/${id}`,
                    success: (data) => {
                        
                        $(tableRow).remove();
                        toastr.error(data.delete);
                      

                    },
                    error: (error) => {
                        console.log(error);
                    }

                })


        })
    });

