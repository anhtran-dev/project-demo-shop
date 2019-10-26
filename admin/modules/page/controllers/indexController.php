<?php

function construct() {
    load_model('index');
    load('lib', 'validation', 'paging');
}

function indexAction() {
    global $notifi, $error;
    #Trường hợp : Người dùng tìm kiếm trên thanh công cụ
    if (isset($_POST['btn_search'])) {
        $search = $_POST['search'];
        $list_page = get_info_search($search);
        $creator_page = get_creator_page();
        $data['list_page'] = $list_page;
        $data['creator_page'] = $creator_page;
        load_view('index', $data);
    }
    #Trường hợp  người dùng thực hiện các thao tác liên quan đến checkbox
    if (isset($_POST['btn_action'])) {
        if (($_POST['actions'] == '')) {
            $error['action'] = "Bạn chưa chọn tác vụ muốn thực hiên";
        } else {
            if (!isset($_POST['checkItem'])) {
                $error['action'] = "Bạn chưa chọn bản ghi cần thực hiện tác vụ";
            } else {
                if ($_POST['actions'] == 'delete') {
                    $check = $_POST['checkItem'];

                    $list_check = implode(',', $check);
                    deletePage_by_check($list_check);
                    $notifi['delete'] = "Xóa thành công";
                }
            }
        }
    }
    
    $list_page = get_list_page();
    $creator_page = get_creator_page();
//    show_array($creator_page);
    $data['list_page'] = $list_page;
    $data['creator_page'] = $creator_page;
    load_view('index', $data);
}

function addPageAction() {
    global $error, $notifi;

    // Xử lí Thêm mới page
    if (isset($_POST['btn_add_page'])) {
        // Chuẩn hóa dữ liệu
        # Tiêu đề
        if (empty($_POST['title'])) {
            $error['title'] = "Tiêu đề không được rỗng";
        } else {
            $title = $_POST['title'];
        }
        #detail
        if (empty($_POST['detail'])) {
            $error['detail'] = 'Vui lòng nhập chi tiết bài viết';
        } else {
            if (strlen($_POST['detail']) < 50) {
                $error['detail'] = "Chi tiết bài viết phải lớn hơn 50 kí tự";
            } else {
                $detail = $_POST['detail'];
            }
        }
        #Kết luận
        if (empty($error)) {
            $id = get_info_field_user($_SESSION['user_login'], $field = 'user_id');

            $data = array(
                'page_title' => $title,
                'page_content' => $detail,
                'created_date' => time(),
                'user_id' => $id,
            );

            addPage($data);
            $notifi['add_page'] = "Thêm trang mới thành công";
        }
    }


    load_view('addPage');
}

function deleteAction() {
    $id = (int) ($_GET['id']);
    deletePage($id);
    redirect_to("?mod=page&controller=index&action=index");
}

function updateAction() {
    global $error, $notifi;
    $id = (int) $_GET['id'];

    # Xử lí upload file
    if (isset($_POST['btn_upload_thumb'])) {
        $upload_dir = "public/images/";
        $upload_file = $upload_dir . $_FILES['file']['name'];
        #1.----------- Xử lí đúng file ảnh---------------
        // mảng những đuôi file được upload
        $type_allow = array('png', 'jpg', 'gif');
        // lấy đuôi file được upload
        $type_img = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        // Nếu đuôi file lâý được không nằm trong mảng được cho phép
        if (!in_array(strtolower($type_img), $type_allow)) {
            $error['file'] = "Đuôi file không đươc hỗ trợ";
            echo "<br>";
        } else {


            #2.-------------- kiểm tra kích thước file update (<20MB)-------------
            $file_size = $_FILES['file']['size'];

            if ($file_size > 20971520) {
                $error['file'] = "Kích thước file phải < 20MB";
            }
            echo "<br>";

            #3.-------------- Kiếm tra trùng file name trên hệ thống-------------------

            if (file_exists($upload_file)) {

                // ==== Xử lí đổi tên file tự động
                // File = tên file + đuôi file
                // Lấy tên file
//          
                $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);

                // Tạo tên mới
                $new_file_name = $file_name . '-Copy.';

                // Tạo 1 đường dẫn mới
                // đường dẫn mới = thư mục chứa file ($upload_dir) + tên file mới + đuôi file
                $new_upload_file = $upload_dir . $new_file_name . $type_img;


                // Kiểm tra nếu file Copy đã tồn tại thì cần thêm số thứ tự sau để phân biệt
                // Copy(1) Copy(2) Copy(3)............Copy(k)
                // tạo vòng lặp để kiểm tra sự tồn tại file copy
                $k = 1;
                while (file_exists($new_upload_file)) {
                    // Tạo tên mới
                    $new_file_name = $file_name . "-Copy({$k}).";


                    // Tạo 1 đường dẫn mới
                    // đường dẫn mới = thư mục chứa file ($upload_dir) + tên file mới + đuôi file
                    $new_upload_file = $upload_dir . $new_file_name . $type_img;
                    $k++;
                }
                // Cập nhật lại đường dẫn mới cho file upload
                $upload_file = $new_upload_file;
            }
        }
        if (empty($error)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                $notifi['upload_file'] = "Upload file thành công";
                $data['upload_file'] = $upload_file;
                load_view('update', $data);
            } else {
                $notifi['upload_file'] = "Upload file không thành công";
            }
        }
    }


    // Xử lí cập nhật page
    if (isset($_POST['btn_update'])) {
        // Chuẩn hóa dữ liệu
        # Tiêu đề
        if (empty($_POST['title'])) {
            $error['title'] = "Tiêu đề không được rỗng";
        } else {
            $title = $_POST['title'];
        }
        #detail
        if (empty($_POST['detail'])) {
            $error['detail'] = 'Vui lòng nhập chi tiết bài viết';
        } else {
            if (strlen($_POST['detail']) < 500) {
                $error['detail'] = "Chi tiết bài viết phải lớn hơn 500 kí tự";
            } else {
                $detail = $_POST['detail'];
            }
        }
        #Kết luận
        if (empty($error)) {
            $id = get_info_field_user($_SESSION['user_login'], $field = 'user_id');

            $data = array(
                'page_title' => $title,
                'page_content' => $detail,
            );

            updatePage($id, $data);
            $notifi['update'] = "Cập nhật thông tin trang thành công";
        }
    }

    // lấy dữ liệu bản ghi theo id

    $page = get_list_page_by_id($id);
    $data['page'] = $page;

    load_view("update", $data);
}
