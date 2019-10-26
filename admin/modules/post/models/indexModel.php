<?php
function get_list_post() {
    $list_post = db_fetch_array("SELECT * FROM `tbl_posts`");
    
    return $list_post;
}
function get_num_row() {
    return db_num_rows("SELECT * FROM `tbl_posts`");
}
function get_info_search($data){
    return db_fetch_array("SELECT * FROM `tbl_posts`  WHERE `title` LIKE '%{$data}%' OR `status` LIKE '%{$data}%'");
}
function get_info_search_by_page($data,$start,$num_per_page){
    return db_fetch_array("SELECT * FROM `tbl_posts`  WHERE `title` LIKE '%{$data}%' OR `status` LIKE '%{$data}%' LIMIT {$start},{$num_per_page}");
}

function  get_num_post_search_status_1($data){
    return db_num_rows("SELECT * FROM `tbl_posts` WHERE `status` = '1' AND (`title` LIKE '%{$data}%' OR `status` LIKE '%{$data}%')");
}
function  get_num_post_search_status_0($data){
    return db_num_rows("SELECT * FROM `tbl_posts` WHERE `status` = '0' AND (`title` LIKE '%{$data}%' OR `status` LIKE '%{$data}%')");
}
function get_list_post_by_page($start, $num_per_page) {
    $list_post = db_fetch_array("SELECT * FROM `tbl_posts` LIMIT {$start},{$num_per_page}");
    foreach ($list_post as &$post) {
        $post['delete'] = "?mod=post&controller=index&action=delete&id={$post['id']}";
        $post['update'] = "?mod=post&controller=index&action=update&id={$post['id']}";
        $post['active'] = "?mod=post&controller=index&action=active&id={$post['id']}";
    }
    return $list_post;
}
// xóa phần tử được chọn bởi checkbox
function deletePost_by_check($list_check){
    
    return db_delete('tbl_posts', " `id` IN ({$list_check})");
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

function addPost($data){
    return db_insert('tbl_posts', $data);
}

function get_list_post_cat(){
    $list_post_cat =  db_fetch_array("SELECT * FROM `tbl_post_cat`");
    
    return $list_post_cat;
}

function  get_num_post_status_1(){
    return db_num_rows("SELECT * FROM `tbl_posts` WHERE `status` = '1'");
}
function  get_num_post_status_0(){
    return db_num_rows("SELECT * FROM `tbl_posts` WHERE `status` = '0'");
}


function get_post_by_id($id){
    return db_fetch_row("SELECT * FROM `tbl_posts` WHERE `id` = {$id}");
}

function updatePost($id, $data){
    return db_update('tbl_posts', $data, "`id`={$id}");
}
function deletePost($id) {
    return db_delete('tbl_posts', "`id` = {$id}");
}

function activePost($id,$data){
    return db_update('tbl_posts', $data, "`id` ={$id}");
}

function get_info_cat(){
    
    return db_fetch_array("SELECT b.`title`,b.`id` FROM `tbl_posts` a JOIN  `tbl_post_cat` b ON a.`post_cat_id`=b.`id` ");
}