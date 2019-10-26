<?php

function get_list_post_cat(){
    $list_post_cat =  db_fetch_array("SELECT * FROM `tbl_post_cat`");
    foreach ($list_post_cat as &$item) {
        $item['delete'] = "?mod=post&controller=postCat&action=deletePostCat&id={$item['id']}";
        $item['update'] = "?mod=post&controller=postCat&action=updatePostCat&id={$item['id']}"; 
        $item['active'] = "?mod=post&controller=postCat&action=active&id={$item['id']}";
    }
    return $list_post_cat;
}


// Hàm xuất thông tin về trạng thái
function show_status($status) {
    // mảng dữ liệu giới tính
//    key => hiển thị cho người dùng
    $list_status = array(
        '0' => 'Chờ xét duyệt',
        '1' => 'Hoạt động',
    );

    if (array_key_exists($status, $list_status)) {
        return $list_status[$status];
    }
}

function addPostCat($data){
    return db_insert('tbl_post_cat', $data);
}
function get_post_cat_by_id($id){
    return db_fetch_row("SELECT * FROM `tbl_post_cat` WHERE `id` = {$id}");
}

function title_exist($title){
    $check_title = db_num_rows("SELECT * FROM `tbl_post_cat`  WHERE `title`='{$title}'");

    if ($check_title > 0) {
        return true;
    }
    return false;
}
function updateTitlePostCat($id,$data){
    return db_update('tbl_post_cat', $data, "`id`= {$id}");
}
function deletePostCat($id){
    return db_delete('tbl_post_cat', "`id`={$id}");
}

function activePostCat($id,$data){
    return db_update('tbl_post_cat', $data, "`id` ={$id}");
}