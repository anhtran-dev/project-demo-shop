<?php

function construct() {
    load_model('index');
}

function indexAction() {
    $list_item_cart = get_info_cart();
    $total = get_total_cart();

    $data['list_item_cart'] = $list_item_cart;
    $data['total'] = $total;
    load_view('index', $data);
}

function addAction() {
    $id = (int) $_GET['id'];
    // Thêm sản phẩm vào giỏ hàng
    add_cart($id);
    //Update thêm thông tin - Số lượng mua - Tổng tiền đơn hàng
    update_cart();

    redirect_to("?mod=cart&action=index");
}

function deleteAction() {
    $id = (int) $_GET['id'];
    delete_cart($id);
    redirect_to("?mod=cart&action=index");
}

function updateAction() {
    if(isset($_POST['btn_update_cart'])){
//        show_array($_POST['qty']);
    update_info_cart($_POST['qty']);
    redirect_to("?mod=cart&action=index");
    }
}
