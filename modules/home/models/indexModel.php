<?php

function get_list_product_feature(){
    $result = db_fetch_array("SELECT * FROM `tbl_product` ORDER BY RAND()  LIMIT 8");
    foreach ($result as &$item){
        $item['detail'] ="?mod=product&action=detail&id={$item['id']}";
    }
    return $result;
}

function get_list_product_phone($cat_id){
    $result =  db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` ={$cat_id} ORDER BY `created_date` Desc  LIMIT 8");
    foreach ($result as &$item){
        $item['detail'] ="?mod=product&action=detail&id={$item['id']}";
    }
    return $result;
}

function get_list_product_laptop($cat_id){
    $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` ={$cat_id} ORDER BY `created_date` Desc  LIMIT 8");
    foreach ($result as &$item){
        $item['detail'] ="?mod=product&action=detail&id={$item['id']}";
    }
    return $result;
}

function get_list_product_tablet($cat_id){
    $result = db_fetch_array("SELECT * FROM `tbl_product` WHERE `cat_id` ={$cat_id} ORDER BY `created_date` Desc  LIMIT 8");
    foreach ($result as &$item){
        $item['detail'] ="?mod=product&action=detail&id={$item['id']}";
    }
    return $result;
}

function get_product_cat($cat_id){
    $result = db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `id`={$cat_id}");
    $result['see_all'] = "?mod=product&action=index&cat_id={$cat_id}";
    return $result;
}

function get_list_product_selling(){
    $result = db_fetch_array("SELECT * FROM `tbl_product` ORDER BY RAND()  LIMIT 10");
    foreach ($result as &$item){
        $item['detail'] ="?mod=product&action=detail&id={$item['id']}";
    }
    return $result;
}