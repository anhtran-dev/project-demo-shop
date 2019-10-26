<?php

function get_item_cart(){
    return $_SESSION['cart']['buy'];
}
function get_total_cart(){
    return $_SESSION['cart']['info']['total'];
}
function get_list_product_id_cart(){
    $list_id = array();
    foreach ($_SESSION['cart']['buy'] as $item) {
        $list_id[] = $item['id'];
    }
    return $list_id;
}
function add_sales($data){
    
    return db_insert('tbl_sales', $data);
}