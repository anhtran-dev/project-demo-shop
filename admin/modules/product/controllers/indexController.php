<?php

function construct() {
    load_model('index');
    load('lib', 'validation');
    load('lib', 'paging');
}

function indexAction() {
    $error = array();
    $notifi = array();
    global $error, $notifi;
    $list_product = get_list_product();
    #------------- Paging ---------------------
    
    // Tổng số bản ghi
    $num_row = count($list_product);
    $total_row = $num_row;
    // số lượng bản ghi trên mỗi trang(cố định)
    $num_per_page = 10;
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
    
    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['start'] = $start;
    $list_product_by_page = get_list_product_page($start,$num_per_page);
    $info_cat = get_cat_product();
    $num_product = get_num_product();
//    show_array($info_cat);
    $data['list_product'] = $list_product;
    $data['list_product_by_page'] = $list_product_by_page;
    $data['num_product'] = $num_product;
    $data['info_cat'] = $info_cat;
    #Trường hợp người dùng tìm kiếm
    if(isset($_POST['btn_search'])){
        $data_search = $_POST['search'];
        $list_product_by_page = get_list_product_by_search($data_search,$start,$num_per_page);
        $num_product = get_num_product_search($data_search);
        $data['list_product_by_page'] = $list_product_by_page;
        $data['num_product'] = $num_product;
        load_view('index',$data);
    }
    else{
       #Trường hợp : Người dùng thực hiện các thao tác đồng loạt
        if (isset($_POST['btn_action'])) {
            
            if (($_POST['actions'] == "")) {
                
                $error['action'] = "Bạn chưa chọn tác vụ muốn thực hiên";
            } else {
                if (!isset($_POST['checkItem'])) {
                    $error['action'] = "Bạn chưa chọn bản ghi cần thực hiện tác vụ";
                } else {
                    if ($_POST['actions'] == 'delete') {
                        $check = $_POST['checkItem'];

                        $list_check = implode(',', $check);  
                        
                        deleteProduct_by_check($list_check);
                        $notifi['delete'] = "Xóa thành công";
//                     
                    }
                }
            }
        }
        
       load_view('index',$data); 
    }
    
    
}

function addAction() {
    $error = array();
    $notifi = array();
    global $error, $notifi,$upload_thumb;
    if (isset($_POST['btn_add_product'])) {
#chuẩn hóa dữ liệu form

        if (empty($_POST['product_name'])) {
            $error['product_name'] = "Tên sản phẩm không được rỗng";
        } else {
            $product_name = htmlentities($_POST['product_name']);
        }
        $code_product = htmlentities($_POST['product_code']);
        if (!is_numeric($_POST['price'])) {
            $error['price'] = "Giá sản phẩm không được rỗng, phải là số";
        } else {
            $price = $_POST['price'];
        }
        if (!is_numeric($_POST['product_qty'])) {
            $error['qty'] = "Nhập lại số lượng sản phẩm";
        } else {
            if (is_int($_POST['product_qty'])) {
                $error['qty'] = "Số lượng sản phẩm phải là số nguyên ";
            } 
            if($_POST['product_qty'] < 0){
                $error['qty'] = "Số lượng sản phẩm phải lớn hơn 0 ";
            }
            else {
                $product_qty = (int) $_POST['product_qty'];
                
            }
        }
        $product_desc = htmlentities($_POST['desc']);
        if (empty($_POST['detail'])) {
            $error['detail'] = "Nhập chi tiết sản phẩm";
        } else {
            $detail = htmlentities($_POST['detail']);
        }
        if ($_POST['parent_cat'] == "") {
            $error['parent_cat'] = "Chọn danh mục cha của sản phẩm";
        } else {
            $parent_cat = $_POST['parent_cat'];
        }
        
        
       
//        #Upload File
//        $upload_thumb = "";
//        if (isset($_POST['btn_upload_thumb'])) {
//            $error = array();
//            $upload_dir = "public/images";
//            $upload_thumb = $upload_dir . $_FILES['thumb_product']['name'];
//            #1.----------- Xử lí đúng file ảnh---------------
//            // mảng những đuôi file được upload
//            $type_allow = array('png', 'jpg', 'gif');
//            // lấy đuôi file được upload
//            $type_img = pathinfo($_FILES['thumb_product']['name'], PATHINFO_EXTENSION);
//
//            // Nếu đuôi file lâý được không nằm trong mảng được cho phép
//            if (!in_array(strtolower($type_img), $type_allow)) {
//                $error['file_type'] = "Đuôi file không đươc hỗ trợ";
//                echo "<br>";
//            } else {
//
//
//                #2.-------------- kiểm tra kích thước file update (<20MB)-------------
//                $file_size = $_FILES['thumb_product']['size'];
//                
//                if ($file_size > 20971520) {
//                    $error['file_size'] = "Kích thước file phải < 20MB";
//                }
//                echo "<br>";
//
//                #3.-------------- Kiếm tra trùng file name trên hệ thống-------------------
//
//                if (file_exists($upload_thumb)) {
//
//                    // ==== Xử lí đổi tên file tự động
//                    // File = tên file + đuôi file
//                    // Lấy tên file
////          
//                    $file_name = pathinfo($_FILES['thumb_product']['name'], PATHINFO_FILENAME);
//
//                    // Tạo tên mới
//                    $new_file_name = $file_name . '-Copy.';
//
//                    // Tạo 1 đường dẫn mới
//                    // đường dẫn mới = thư mục chứa file ($upload_dir) + tên file mới + đuôi file
//                    $new_upload_thumb = $upload_dir . $new_file_name . $type_img;
//
//
//                    // Kiểm tra nếu file Copy đã tồn tại thì cần thêm số thứ tự sau để phân biệt
//                    // Copy(1) Copy(2) Copy(3)............Copy(k)
//                    // tạo vòng lặp để kiểm tra sự tồn tại file copy
//                    $k = 1;
//                    while (file_exists($new_upload_thumb)) {
//                        // Tạo tên mới
//                        $new_file_name = $file_name . "-Copy({$k}).";
//
//
//                        // Tạo 1 đường dẫn mới
//                        // đường dẫn mới = thư mục chứa file ($upload_dir) + tên file mới + đuôi file
//                        $new_upload_thumb = $upload_dir . $new_file_name . $type_img;
//                        $k++;
//                    }
//                    // Cập nhật lại đường dẫn mới cho file upload
//                    $upload_thumb = $new_upload_thumb;
//                }
//            }
//            #Kết luận upload ảnh
//            if (empty($error)) {
//                if (move_uploaded_file($_FILES['thumb_product']['tmp_name'], $upload_thumb)) {
//                    $notifi['upload_file'] = "Upload file thành công";
//                } else {
//                    $notifi['upload_file'] = "Upload file không thành công";
//                }
//                
//                
//            }
//        }
        #Kết luận
        if(empty($error)){
            $data = array(
                'product_title' => $product_name,
                'code' => $code_product,
                'product_desc' => $product_desc,
                'price' => $price,
                'qty' => $product_qty,
//                'thumb' => '',
                'product_detail' => $detail,
                'created_date' => time(),
                'cat_id' => $parent_cat,
            );
            
            addProduct($data);
            $notifi['add'] ="Thêm sản phẩm mới thành cống";
        }
    }
    $list_cat = get_list_cat_product();
    $data['list_cat'] = $list_cat;
    $data['upload_thumb'] = $upload_thumb;
    load_view('add',$data);
}

function deleteAction(){
    $id =(int)$_GET['id'];
    deleteProduct($id);
    redirect_to("?mod=product&action=index");
}

function updateAction(){
    load_view('update');
}