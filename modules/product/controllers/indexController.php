<?php

function construct() {
    load_model('index');
    load('lib', 'paging');
}

function indexAction() {
    $cat_id = (int) $_GET['cat_id'];
    $num_product = get_total_row($cat_id);
    #------------- Paging ---------------------
    // Tổng số bản ghi
    
    $total_row = $num_product ;
    // số lượng bản ghi trên mỗi trang(cố định)
    $num_per_page = 8;
    // Tổng số lượng trang cần thiết để chứa tất cả bản ghi
    $num_page = ceil($total_row / $num_per_page);
    // Lấy $page(chỉ số trang hiện tại) từ url
    if (isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    } else {
        $page = 1;     // mặc định đang đứng ở page 1
    }
    //Chỉ số bản ghi bắt đầu mỗi trang
    $start = ($page - 1) * $num_per_page;
    $list_product = get_list_product_by_cat_id($cat_id,$start,$num_per_page);
    $product_cat = get_info_cat($cat_id);

    //    show_array($list_product);
    $data['cat_id'] = $cat_id;
    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['num_product'] = $num_product;
    $data['list_product'] = $list_product;
    $data['product_cat'] = $product_cat;
    load_view('index', $data);
}


function detailAction(){
    $id = (int)$_GET['id'];
    $item = get_product_by_id($id);
    $list_product_same = get_list_product_same($id);
    
    $data['item'] = $item;
    $data['list_product_same'] = $list_product_same;
    load_view('detail',$data);
}

function filterAction(){
//    $cat_id = $_GET['cat_id'];
    $price = $_POST['price'];
    echo $price;
//    $list_product = get_list_product_filter($cat_id);
//    $data['list_product'] = $list_product;
//    $data['cat_id'] = $cat_id;
//    load_view('filter',$data);
}