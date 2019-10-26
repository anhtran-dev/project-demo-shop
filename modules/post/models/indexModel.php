<?php

function get_num_post(){
    return db_num_rows("SELECT * FROM `tbl_posts`");
}

function get_list_post($start,$num_per_page){
    $result = db_fetch_array("SELECT * FROM `tbl_posts` LIMIT {$start},{$num_per_page}");
    foreach ($result as &$item){
        $item['detail'] ="?mod=post&action=detail&id={$item['id']}";
    }
    return $result;
}
function get_post_by_id($id){
    return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `id`={$id}");
}
function get_list_post_relate($id){
    $result = db_fetch_array("SELECT * FROM `tbl_posts` WHERE `id` != {$id} ORDER BY RAND() LIMIT 3");
    foreach ($result as &$item){
        $item['detail'] ="?mod=post&action=detail&id={$item['id']}";
    }
    return $result;
}