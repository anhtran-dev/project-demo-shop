$(document).ready(function(){
    
    $(".num-order").change(function(){
        var price = $(this).closest('tr').find('.price').text();
        var num_order = $(this).val();
        var total = $('#total-price').text();
//        alert(total);
        $data = {price:price ,num_order:num_order,total:total};
        
        
        var me = this;
        $.ajax({
            url : "?mod=cart&action=update",
            method: 'POST',
            data:$data,
            dataType: 'json',
            success: function(data){
                
//                $(me).closest('tr').find('.sub-total').text(data.sub_total);
//                $('#total-price').text(data.total_new);
            },
        });
    });
    
});


