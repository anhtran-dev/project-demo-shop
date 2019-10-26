$(document).ready(function(){
    $('.priceless2tr').click(function(){
        var price = 2000000;
        alert(price);
        $.ajax({
            url:'?mod=product&action=filter',
            method:'POST',
            data:{price:price},
            dataType : 'json',
            success:function(data){
                $('#list-product-wp ul.list-item').html(data);
            }
            
        })
    })
})


