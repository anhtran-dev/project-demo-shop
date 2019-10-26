<?php

###----------- Kiểm tra username - password đã đúng với database chưa ?? ---###

function check_login($username, $password) {
    $list_user = db_fetch_array("SELECT * FROM `tbl_users`");
    foreach ($list_user as $user) {
        if ($username == $user['username'] && $password == $user['password']) {
            return TRUE;
        }
    }
    return FALSE;
}

###---------------Lấy dữ liệu Username , hiển thị trên header ------------###
// Nếu đã login trả về TRUE , ngược lại trả về FALSE

function is_login() {

    if (isset($_SESSION['is_login'])) {
        return TRUE;
    }
    return FALSE;
}
function remember_login() {

    if (isset($_COOKIE['is_login'])) {
        return TRUE;
    }
    return FALSE;
}

// Nếu is_login trả về TRUE thì xuất dữ liệu 
function get_username() {
    if (is_login()) {
        $user_login = $_SESSION['is_login'];
        return $user_login;
    }
    return false;
}

//----------------------------------------
###------------- Lấy thông tin khác từ username đã đăng nhập vào hệ thống -------###
//$username : user đã đăng nhập vào hệ thống
//$field : trường - trường cần lấy của user

function get_infor_user($username, $field = 'id') {
    global $list_user;
    if(isset($_SESSION['is_login'])){
        foreach ($list_user as $user){
            if($username == $user['username']){
                if(array_key_exists($field, $user)){
                    return $user[$field];
                }
            }
        }
    }
    return FALSE;
}
