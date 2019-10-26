<?php
#------------- Paging ---------------------
    
//    // Tổng số bản ghi
//    $num_row = get_num_row();
//    $total_row = $num_row;
//    // số lượng bản ghi trên mỗi trang(cố định)
//    $num_per_page = 5;
//    // Tổng số lượng trang cần thiết để chứa tất cả bản ghi
//    $num_page = ceil($total_row / $num_per_page);
//    // Lấy $page(chỉ số trang hiện tại) từ url
//    if (isset($_GET['page'])) {
//        $page = (int) $_GET['page'];
//    } else {
//        $page = 1;     // mặc định đang đứng ở page 1
//    }
//    //Chỉ số bản ghi bắt đầu mỗi trang
//    $start = ($page - 1) * $num_per_page;

function get_paging($num_page , $page, $base_url){
    $str_paging = "<div id= 'paging-wp'>" ;
    $str_paging .= "<u class = 'paging'>";
    if($page > 1){
        $page_prev = $page - 1;
        $str_paging .= "<li><a href=\"{$base_url}&page={$page_prev}\">Trước</a></li>";
    }
    for($i = 1 ;$i <=$num_page ; $i++){
        $active ="";
        if($page == $i){
            $active = "class='active'";
        }
        $str_paging .= "<li {$active}><a href=\"{$base_url}&page={$i}\">$i</a></li>";
        unset ($active);
    }
    if($page < $num_page){
        $page_next = $page + 1;
        $str_paging .= "<li><a href=\"{$base_url}&page={$page_next}\">Sau</a></li>";
    }
    $str_paging .= "</u>";
    $str_paging .= "</div>";
    return $str_paging;
}