$(document).ready(function (){
    let baseUrl= window.location.origin;

    function addCart() {
        let foodId = $(this).attr("data-id");
        $.ajax({
            url:baseUrl+'/home/shop/'+ foodId + '/addtocart',
            type: "GET",
            dataType: "json",
            success: function (data) {
                let count=0;
                for (const dataKey in data) {
                    count++;
                }
                $('#shoppingCart').html(count);
            },
            error: function () {
                console.log('13123')
            }
        })
    }
    $(document).on('click','.addtocart',addCart);
    function cartUpdate(){
        let urlcart= $('.updatecart').data('url');
        let foodId= $(this).attr('data-id');
        let quantity= $(this).parents('tr').find('input').val();
        $.ajax({
            url: urlcart,
            type: "GET",
            data:{id:foodId, quantity: quantity},
            success: function (data){
               if (data.code==200){
                   $('.card-body').html(data.cart_compoment);
               }

            },
            error: function (){
            }
        });
    }
    $(document).on('click','.cartUpdate',cartUpdate);


    function cartRemove(){
        let urlDelete= $('.cartrm').data('url');
        let foodId= $(this).attr('remove-id');
        $.ajax({
            url: urlDelete,
            type: "GET",
            data:{id:foodId},
            success: function (data){
                if (data.code==200){
                    $('.card-body').html(data.cart_compoment);
                    alert('xoa thanh cong')
                }

            },
            error: function (){
            }
        });
    }
    $(document).on('click','.cartRemove',cartRemove);
});
