<?php 
function get_info_user_by_username($user_login){
    return db_fetch_row("SELECT * FROM `tbl_users_admin` WHERE `username` = '{$user_login}'");
}

function update_user_login($user_login, $data){
    return db_update('tbl_users_admin', $data, "`username` = '{$user_login}'");
}
function updatePassword($user_login, $data){
    return db_update('tbl_users_admin', $data, "`username` = '{$user_login}'");
}

function check_old_pass($user_login,$old_pass){
    $check_pass = db_num_rows("SELECT * FROM `tbl_users_admin`  WHERE `username`='{$user_login}' AND `password`='{$old_pass}' ");

    if ($check_pass > 0) {
        return true;
    }
    return false;
}
