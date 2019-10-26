<?php

function get_num_row() {
    return db_num_rows("SELECT * FROM `tbl_users_admin`");
}

function get_list_users_admin($start, $num_per_page) {
    $list_user = db_fetch_array("SELECT * FROM `tbl_users_admin` LIMIT {$start},{$num_per_page}");
    foreach ($list_user as &$user) {
        $user['delete_user'] = "?mod=users&controller=team&action=delete&id={$user['user_id']}";
        $user['update_user'] = "?mod=users&controller=team&action=update&id={$user['user_id']}";
    }
    return $list_user;
}
function update_user_by_id($id, $data){
    return db_update('tbl_users_admin', $data, "`user_id` = '{$id}'");
}
// xóa phần tử theo $id
function deleteUser($id) {
    return db_delete('tbl_users_admin', "`user_id`={$id}");
}

function get_info_search($data){
    return db_fetch_array("SELECT * FROM `tbl_users_admin` WHERE `fullname` LIKE '%{$data}%' OR `username` LIKE '%{$data}%' OR `email` LIKE '%{$data}%'");
}

function user_exist($username, $email) {
    $check_user = db_num_rows("SELECT * FROM `tbl_users_admin`  WHERE `username`='{$username}' OR `email`='{$email}' ");

    if ($check_user > 0) {
        return true;
    }
    return false;
}

function add_user($data) {
    return db_insert('tbl_users_admin', $data);
}

function get_info_user_by_id($id){
    return db_fetch_row("SELECT * FROM `tbl_users_admin` WHERE `user_id` = '{$id}'");
}

// xóa phần tử được chọn bởi checkbox
function deleteUser_by_check($list_check){
    
    return db_delete('tbl_users_admin', " `user_id` IN ({$list_check})");
}