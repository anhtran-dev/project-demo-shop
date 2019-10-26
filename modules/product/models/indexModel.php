<?php

function get_list_product_by_cat_id($cat_id, $start, $num_per_page) {
    $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` = {$cat_id} LIMIT {$start},{$num_per_page}");
    foreach ($result as &$item) {
        $item['detail'] = "?mod=product&action=detail&id={$item['id']}";
    }
    return $result;
}

function get_info_cat($cat_id) {
    $result = db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `id`={$cat_id}");
    return $result;
}

function get_total_row($cat_id) {
    return db_num_rows("SELECT * FROM `tbl_product` WHERE `cat_id` = {$cat_id}");
}

function get_product_by_id($id) {
    $result = db_fetch_row("SELECT * FROM `tbl_product` WHERE `id` ={$id}");

    $result['add_cart'] = "?mod=cart&controller=index&action=add&id={$id}";

    return $result;
}

function get_list_product_same($id) {
    $item = db_fetch_row("SELECT * FROM `tbl_product` WHERE `id` ={$id}");
    $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `id` != {$id} AND `cat_id` = {$item['cat_id']} ORDER BY RAND() LIMIT 4");
    foreach ($result as &$item) {
        $item['detail'] = "?mod=product&action=detail&id={$item['id']}";
    }
    return $result;
}
function get_list_product_filter($cat_id){
    $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `price` < 2000000 AND `cat_id` ={$cat_id}");
    return $result;
}