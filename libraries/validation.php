<?php
    // Hàm kiểm tra định dạng username
    function is_username($username){
        $parttern = "/^[\w_\.]{5,32}$/";
        if(preg_match($parttern, $username, $matchs)){
            return true;
        }
        return false;
    }
    
    // Hàm kiểm tra định dạng password
    function is_password($password){
        $parttern = "/^([A-Z]){1}([A-Za-z0-9_\.!@#$%^&*()]+){5,31}$/";
        if(preg_match($parttern, $password, $matchs)){
            return true;
            
        }
        return false;
    }
    
    // Hàm kiểm tra định dạng email
    function is_email($email){
        $parttern = '/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/';
        if(preg_match($parttern,$email,$matchs)){
            return true;
        }
        return false;
    }
    
    // Hàm xuất lỗi
//    label_field : Nhãn của tên lỗi
    function form_error($label_field){
        global $error;
        if(!empty($error[$label_field])) 
            return "<p class='error'> {$error[$label_field]} </p>" ;
    }
    
    // Hàm set value
    function set_value($label_field){
        global $$label_field;
        if(!empty($$label_field))
            return $$label_field;
    }