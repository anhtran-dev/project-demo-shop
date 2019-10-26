<?php

function title_exist($title){
    $check_title = db_num_rows("SELECT * FROM `tbl_product_cat`  WHERE `cat_title`='{$title}'");

    if ($check_title > 0) {
        return true;
    }
    return false;
}

function addCat($data){
    return db_insert('tbl_product_cat', $data);
}
function get_list_product_cat(){
    $result =  db_fetch_array("SELECT * FROM `tbl_product_cat`");
    foreach ($result as &$item){
        $item['url_update'] = "?mod=product&controller=productCat&action=update&id={$item['id']}";
        $item['url_delete'] = "?mod=product&controller=productCat&action=delete&id={$item['id']}";
    }
    return $result;
}
function get_product_cat_by_id($id){
    return db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `id`={$id}");
}
function updateProductCat($id,$data){
    return db_update('tbl_product_cat', $data, "`id`= {$id}");
}
function deleteCat($id){
    return db_delete('tbl_product_cat', "`id` = {$id}");
}