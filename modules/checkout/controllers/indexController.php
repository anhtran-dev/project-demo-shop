<?php

function construct() {
    load_model('index');
    load('lib', 'validation');
}

function indexAction() {
    $error = array();
    global $error, $fullname, $email, $address, $phone, $note;
    if (isset($_POST['btn_checkout_home'])) {
        if (empty($_POST['fullname'])) {
            $error['fullname'] = "Nhập họ và tên người nhận hàng!!";
        } else {
            $fullname = htmlentities($_POST['fullname']);
        }

        $email = htmlentities($_POST['email']);

        
        if (empty($_POST['address'])) {
            $error['address'] = "Không để trống địa chỉ nhận hàng";
        } else {
            $address = htmlentities($_POST['address']);
        }

        if (empty($_POST['phone'])) {
            $error['phone'] = "Không để trống số điện thoại";
        } else {
            $phone = htmlentities($_POST['phone']);
        }
        $note = htmlentities($_POST['note']);

        if (empty($error)) {
            $list_product_id_cart = get_list_product_id_cart();
            show_array($list_product_id_cart);
            $data = array(
                'fullname' => $fullname ,
                'email' => $email ,
                'phone' => $phone,
                'address' => $address,
                'note' => $note,
                'product_id' => $list_product_id_cart,
            );
//            add_sales($data);
        }
    }
    
    $list_item_cart = get_item_cart();
    $total = get_total_cart();
    $data['list_item_cart'] =$list_item_cart;
    $data['total'] = $total;
    
    load_view('index',$data);
}
