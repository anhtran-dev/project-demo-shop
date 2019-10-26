<?php

function construct() {
    load_model('index');
    load('lib', 'validation');
    load('lib', 'paging');
}

// danh sách bài viết
function indexAction() {
    global $notifi, $error;
    #------------- Paging ---------------------
    // Tổng số bản ghi
    $num_row = get_num_row();
    $total_row = $num_row;
    // số lượng bản ghi trên mỗi trang(cố định)
    $num_per_page = 5;
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

    #Trường hợp: Người dùng tìm kiếm trên thanh công cụ
    if (isset($_POST['btn_search'])) {

        $search = $_POST['search'];
        $list_post = get_info_search($search);
        $list_post_by_page = get_info_search_by_page($search, $start, $num_per_page);
//         Trạng thái bài viết

        $num_post_active = get_num_post_search_status_1($search);
        $num_post_wait_approval = get_num_post_search_status_0($search);
        // bài viết thuộc danh mục nào?
        $info_cat = get_info_cat();
        $data['info_cat'] = $info_cat;
        $data['list_post'] = $list_post;
        $data['list_post_by_page'] = $list_post_by_page;
        $data['num_post_active'] = $num_post_active;
        $data['num_post_wait_approval'] = $num_post_wait_approval;
        $data['list_post'] = $list_post;

        load_view('index', $data);
    } else {
        #Trường hợp : Người dùng thực hiện các thao tác đồng loạt
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
                        deletePost_by_check($list_check);
                        $notifi['delete'] = "Xóa thành công";
                    }
                }
            }
        }
        #Trường hợp: Xuất toàn bộ dữ liệu user
        // mảng bản ghi theo page
        $list_post = get_list_post();
        $list_post_by_page = get_list_post_by_page($start, $num_per_page);
        // Trạng thái bài viết
        $num_post_active = get_num_post_status_1();
        $num_post_wait_approval = get_num_post_status_0();
        // bài viết thuộc danh mục nào?
        $info_cat = get_info_cat();
//        show_array($info_cat);
        $data['info_cat'] = $info_cat;
        $data['list_post'] = $list_post;
        $data['list_post_by_page'] = $list_post_by_page;
        $data['num_post_active'] = $num_post_active;
        $data['num_post_wait_approval'] = $num_post_wait_approval;

        load_view('index', $data);
    }
}

function addPostAction() {
    global $error, $notifi;
    // Xử lí Thêm mới bài viết
    if (isset($_POST['btn_add_post'])) {
        // Chuẩn hóa dữ liệu
        # Ảnh đại diện bài viết
        # Tiêu đề
        if (empty($_POST['title'])) {
            $error['title'] = "Tiêu đề không được rỗng";
        } else {
            $title = htmlentities($_POST['title']);
        }
        #desc
        $post_desc = htmlentities($_POST['desc']);
        #detail
        if (empty($_POST['detail'])) {
            $error['detail'] = 'Vui lòng nhập chi tiết bài viết';
        } else {
            if (strlen($_POST['detail']) < 200) {
                $error['detail'] = "Chi tiết bài viết phải lớn hơn 200 kí tự";
            } else {
                $detail = htmlentities($_POST['detail']);
            }
        }
        #chọn bài viết thuộc danh mục
        if (empty($_POST['parent_cat'])) {
            $error['parent_cat'] = "Chọn danh mục của bài viết";
        } else {
            $parent_cat = $_POST['parent_cat'];
        }
        
        # Xử lí upload file hình ảnh đại diện bài viết
        $upload_file = Null;
        if (isset($_FILES['thumb_title'])) {
            $upload_dir = "http://localhost/back-end/PROJECT/ismart.com/admin/public/images/";
            $upload_file = $upload_dir . $_FILES['thumb_title']['name'];
            #1.----------- Xử lí đúng file ảnh---------------
            // mảng những đuôi file được upload
            $type_allow = array('png', 'jpg', 'gif');
            // lấy đuôi file được upload
            $type_img = pathinfo($_FILES['thumb_title']['name'], PATHINFO_EXTENSION);
            // Nếu đuôi file lâý được không nằm trong mảng được cho phép
            if (!in_array(strtolower($type_img), $type_allow)) {
                $error['file'] = "Đuôi file không đươc hỗ trợ";
                echo "<br>";
            } else {
                #2.-------------- kiểm tra kích thước file update (<20MB)-------------
                $file_size = $_FILES['thumb_title']['size'];

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
                    $file_name = pathinfo($_FILES['thumb_title']['name'], PATHINFO_FILENAME);

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
                if (move_uploaded_file($_FILES['thumb_title']['tmp_name'], $upload_file)) {
                    
                }
            }
        }
        
        #Kết luận
        if (empty($error)) {

            $data = array(
                'title' => $title,
                'post_desc' => $post_desc,
                'thumb' => $upload_file,
                'content' => $detail,
                'created_date' => time(),
                'post_cat_id' => $parent_cat,
                
            );

            addPost($data);
            $notifi['add_post'] = "Thêm bài viết mới thành công";
        }
    }




    $list_post_cat = get_list_post_cat();
    $data['list_post_cat'] = $list_post_cat;
    load_view('addPost', $data);
}

function updateAction() {
    global $error, $notifi;
    $id = (int) $_GET['id'];
    // Xử lí cập nhật page
    if (isset($_POST['btn_update'])) {
        // Chuẩn hóa dữ liệu
        # Tiêu đề
        if (empty($_POST['title'])) {
            $error['title'] = "Tiêu đề không được rỗng";
        } else {
            $title = htmlentities($_POST['title']);
        }
        #Mô tả ngắn
        $post_desc = $_POST['desc'];
        #detail
        if (empty($_POST['detail'])) {
            $error['detail'] = 'Vui lòng nhập chi tiết bài viết';
        } else {
            if (strlen($_POST['detail']) < 500) {
                $error['detail'] = "Chi tiết bài viết phải lớn hơn 500 kí tự";
            } else {
                $detail = htmlentities($_POST['detail']);
            }
        }
        #chọn bài viết thuộc danh mục
        if (empty($_POST['parent_cat'])) {
            $error['parent_cat'] = "Chọn danh mục của bài viết";
        } else {
            $parent_cat = $_POST['parent_cat'];
        }
        
        #Kết luận
        if (empty($error)) {

            $data = array(
                'title' => $title,
                'post_desc' => $post_desc,
                'content' => $detail,
                'post_cat_id' => $parent_cat,
            );
            updatePost($id, $data);
            $notifi['update'] = "Cập nhật thông tin trang thành công";
        }
    }

    $post = get_post_by_id($id);
    $list_post_cat = get_list_post_cat();
    $data['post'] = $post;
    $data['list_post_cat'] = $list_post_cat;
    load_view('update', $data);
}

function deleteAction() {
    $id = (int) ($_GET['id']);
    deletePost($id);
    redirect_to("?mod=post&controller=index&action=index");
}

function activeAction() {
    $id = (int) $_GET['id'];
    $data = array(
        'status' => 1,
    );
    activePost($id, $data);
    redirect_to("?mod=post&controller=index&action=index");
}
