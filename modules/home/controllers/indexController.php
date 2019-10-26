<?php

function construct(){
    load_model('index');
}
function indexAction(){
    $list_product_feature = get_list_product_feature();
    $list_product_phone = get_list_product_phone(1);
    $list_product_laptop = get_list_product_laptop(2);
    $list_product_tablet = get_list_product_tablet(5);
    $cat_phone = get_product_cat(1);
    $cat_laptop = get_product_cat(2);
    $cat_tablet = get_product_cat(5);
    $list_product_selling = get_list_product_selling();
    $data['list_product_feature'] = $list_product_feature ;
    $data['list_product_phone'] = $list_product_phone ;
    $data['list_product_laptop'] = $list_product_laptop;
    $data['list_product_tablet'] = $list_product_tablet;
    $data['cat_phone'] = $cat_phone ;
    $data['cat_laptop'] = $cat_laptop;
    $data['cat_tablet'] = $cat_tablet;
    $data['list_product_selling'] = $list_product_selling;
    load_view('index',$data);
}
