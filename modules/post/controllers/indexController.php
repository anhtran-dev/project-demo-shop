<?php

function construct() {
    load_model('index');
    load('lib', 'paging');
}

function indexAction() {
    #------------- Paging ---------------------
    // Tổng số bản ghi

    $total_row = get_num_post();
    // số lượng bản ghi trên mỗi trang(cố định)
    $num_per_page = 4;
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
    $list_post = get_list_post($start, $num_per_page);
    $data['total_row'] = $total_row;
    $data['num_per_page'] = $num_per_page;
    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['list_post'] = $list_post;
    load_view('index', $data);
}

function detailAction() {
    $id = (int) $_GET['id'];
    $post_detail = get_post_by_id($id);
    $list_post_relate = get_list_post_relate($id);
    
    $data['post_detail'] = $post_detail;
    $data['list_post_relate'] = $list_post_relate;
    load_view('detail', $data);
}
