<?php
function get_info_product($id){
    $result = db_fetch_row("SELECT * FROM `tbl_product` WHERE `id` = {$id}");
    $result['detail'] ="?mod=product&action=detail&id={$id}";
    return $result;
}
function add_cart($id){
    $item = get_info_product($id);
    //    show_array($item);
    
    // kiểm tra sản phẩm đã tồn tại trong giỏ hàng 
    // -> nếu có thì cập nhật số lượng sản phẩm đó
    $qty = 1;
    if (isset($_SESSION['cart'])) {
        if (array_key_exists($id, $_SESSION['cart']['buy'])) {
            $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
        }
    }
    
    // Thêm sản phẩm vào giỏ hàng
    $_SESSION['cart']['buy'][$id] = array(
        'id' => $item['id'],
        'product_title' => $item['product_title'],
        'code' => $item['code'],
        'price' => $item['price'],
        'thumb' => $item['thumb'],
        'qty' => $qty,
        'url_detail' => $item['detail'],
        'sub_total' => $item['price'] * $qty, 
    );
    show_array($_SESSION['cart']['buy']);
}

//Update thêm thông tin - Số lượng mua - Tổng tiền đơn hàng
function update_cart(){
    
    $num_order = 0;
    $total = 0;
    foreach ($_SESSION['cart']['buy'] as $item){
        $num_order += $item['qty'];
        $total += $item['sub_total'];
    }
    $_SESSION['cart']['info'] = array(
        'num_order' => $num_order,
        'total' => $total,
    );
    show_array($_SESSION['cart']['info']);
}
function get_info_cart(){
    if(isset($_SESSION['cart'])){
        $result = $_SESSION['cart']['buy'];
        foreach($result as &$item){
            $item['delete'] = "?mod=cart&action=delete&id={$item['id']}";
        }
        return $result;
    }
    
}
function get_total_cart(){
    if(isset($_SESSION['cart'])){
        return $_SESSION['cart']['info']['total'];
    }
}
function delete_cart($id='') {
    if (isset($_SESSION['cart'])) {
        #1. Nếu tồn tại $id => xóa sản phẩm có id đó
        if (!empty($id)) {
            unset($_SESSION['cart']['buy'][$id]);
            update_cart();
            // update lại tổng tiền
        }
        
        #2. Nếu không tồn tại $id => xóa tất cả 
        // Xóa tất cả: link đến xóa tất cả ko chứa id 
        else{
            unset($_SESSION['cart']);
        }
    }
 
}


// Cập nhật lại dữ liệu
// $id => $qty : theo cặp
function update_info_cart($qty){
    foreach($qty as $id => $new_qty){
        // cập nhật lại số lượng
        $_SESSION['cart']['buy'][$id]['qty'] = $new_qty;
        // cập nhật lại thành tiền
        $_SESSION['cart']['buy'][$id]['sub_total'] = $new_qty * $_SESSION['cart']['buy'][$id]['price'];
    }
    // update lại tổng đơn hàng
    update_cart();
}