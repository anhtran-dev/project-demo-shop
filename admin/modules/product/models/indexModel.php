<?php

function get_list_product(){
     $result = db_fetch_array("SELECT * FROM `tbl_product` ");
     
     return $result;
}
function get_list_product_page($start,$num_per_page){
    $result = db_fetch_array("SELECT * FROM `tbl_product` LIMIT {$start},{$num_per_page} ");
    foreach ($result as &$item){
         $item['update'] = "?mod=product&action=update&id={$item['id']}";
         $item['delete'] = "?mod=product&action=delete&id={$item['id']}";
     }
     return $result;
}
function get_num_product(){
    return db_num_rows("SELECT * FROM `tbl_product` ");
}
function get_num_product_search($data){
    return db_num_rows("SELECT * FROM `tbl_product` WHERE `product_title` LIKE '%$data%'");
}
function addProduct($data){
    return db_insert('tbl_product', $data);
}
function get_list_cat_product(){
    return db_fetch_array("SELECT * FROM `tbl_product_cat`");
}
function get_cat_product(){
    return db_fetch_array("SELECT b.`cat_title`,b.`id` FROM `tbl_product` a JOIN  `tbl_product_cat` b ON a.`cat_id`=b.`id`");
}

function get_list_product_by_search($data,$start,$num_per_page){
    $result =  db_fetch_array("SELECT * FROM `tbl_product` WHERE `product_title` LIKE '%$data%' LIMIT {$start},{$num_per_page} ");
    foreach ($result as &$item){
         $item['update'] = "?mod=product&action=update&id={$item['id']}";
         $item['delete'] = "?mod=product&action=delete&id={$item['id']}";
     }
     return $result;
}
function deleteProduct($id){
    return db_delete('tbl_product', "`id` = {$id}");
}
function deleteProduct_by_check($list_check){
    return db_delete('tbl_product', " `id` IN ({$list_check})");
    
}