<?php

function construct() {
    load_model('team');
    load('lib', 'paging');
    load('lib', 'validation');
    load('lib', 'send_mail');
}

function indexAction() {
    global $notifi;
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
    // mảng bản ghi theo page
    $data['num_page'] = $num_page;
    $data['page'] = $page;

    
    #Trường hợp: Người dùng tìm kiếm trên thanh công cụ
    if (isset($_POST['btn_search'])) {
        $search = $_POST['search_user'];
        $list_user = get_info_search($search);

        $data['list_user'] = $list_user;
        load_view('indexTeam', $data);
    }
    
    else {
        #Trường hợp : Người dùng thực hiện các thao tác đồng loạt
        if (isset($_POST['btn_action'])) {
            if (($_POST['actions'] == '')) {
                $notifi['actions'] = "Bạn chưa chọn tác vụ muốn thực hiên";
            } else {
                if (!isset($_POST['checkItem'])) {
                    $notifi['check'] = "Bạn chưa chọn bản ghi cần thực hiện tác vụ";
                } else {
                    if ($_POST['actions'] == 'delete') {
                        $check = $_POST['checkItem'];

                        $list_check = implode(',', $check);                      
                        deleteUser_by_check($list_check);
                        $notifi['delete'] = "Xóa thành công";
//                     
                    }
                }
            }
        }
        #Trường hợp: Xuất toàn bộ dữ liệu user
        $list_user = get_list_users_admin($start, $num_per_page);
        $data['list_user'] = $list_user;
        load_view('indexTeam', $data);
    }
}

function updateAction() {

    global $error, $notifi, $fullname, $phone_number, $address;
    if (isset($_POST['btn_update_user'])) {
        #1. chuẩn hóa dữ liệu fullname
        // ------- Kiểm tra dữ liệu rỗng -------------
        if (empty($_POST['fullname'])) {
            $error['fullname'] = 'Không được để trống họ và tên';
        } else {
            $fullname = $_POST['fullname'];
        }
        #2. Chuẩn hóa dữ liệu phone_number
        // ------- Kiểm tra dữ liệu rỗng -------------
        if (empty($_POST['phone_number'])) {
            $error['phone_number'] = 'Không được để trống số điện thoại';
        } else {
            $phone_number = $_POST['phone_number'];
        }
        #3. Chuẩn hóa dữ liệu address
        // ------- Kiểm tra dữ liệu rỗng -------------
        if (empty($_POST['address'])) {
            $error['address'] = 'Không được để trống địa chỉ';
        } else {
            $address = $_POST['address'];
        }

        #Kết luận

        if (empty($error)) {
            $id = (int) $_GET['id'];
            $data = array(
                'fullname' => $fullname,
                'phone_number' => $phone_number,
                'address' => $address,
            );
            update_user_by_id($id, $data);
            $notifi['update'] = "Cập nhật thông tin tài khoản thành công";
        }
    }
    $id = (int) $_GET['id'];
    $info_user = get_info_user_by_id($id);
    $data['info_user'] = $info_user;
    load_view('updateUser', $data);
}

function deleteAction() {
    $id = (int) $_GET['id'];
    deleteUser($id);
    redirect_to("?mod=users&controller=team&action=index");
}

function regAction() {
    global $error, $notifi, $fullname, $username, $password, $email, $gender;

    if (isset($_POST['btn_reg'])) {
        // Đặt mảng lưu lỗi
        $error = array();

        #1. chuẩn hóa dữ liệu fullname
        // ------- Kiểm tra dữ liệu rỗng -------------
        if (empty($_POST['fullname'])) {
            $error['fullname'] = 'Không được để trống họ và tên';
        } else {
            $fullname = $_POST['fullname'];
        }

        #2. chuẩn hóa dữ liệu username
        // ------- Kiểm tra dữ liệu rỗng -------------
        if (empty($_POST['username'])) {
            $error['username'] = 'Tên username không được để trống';
        } else {
            // ----------Kiểm tra độ dài username -----------------
            if (!(strlen($_POST['username']) > 5) && (strlen($_POST['username']) < 32)) {
                $error['username'] = 'Username phải lớn hơn 5 kí tự và nhỏ hơn 32 kí tự';
            } else {
                // ---------------- Kiểm tra định dạng username ---------
                if (!is_username($_POST['username'])) {
                    $error['username'] = 'Username chỉ sử dụng các kí tự từ A-Za-z0-9 và dấu gạch dưới';
                } else {
                    $username = $_POST['username'];
                }
            }
        }

        #3. chuẩn hóa dữ liệu password
        // ------- Kiểm tra dữ liệu rỗng -------------
        if (empty($_POST['password'])) {
            $error['password'] = 'Tên password không được để trống';
        } else {
            // ----------Kiểm tra độ dài password -----------------
            if (!(strlen($_POST['password']) > 6) && (strlen($_POST['password']) < 32)) {
                $error['password'] = 'Password phải lớn hơn 6 kí tự và nhỏ hơn 32 kí tự';
            } else {
                // ---------------- Kiểm tra định dạng password ---------
                if (!is_password($_POST['password'])) {
                    $error['password'] = 'Password phải bắt đầu bằng kí tự viết hoa ,chỉ sử dụng các kí tự từ A-Za-z0-9 và dấu gạch dưới và các kí tự .!@#$%^&*()';
                } else {
                    $password = md5($_POST['password']);
                }
            }
        }

        #4. chuẩn hóa dữ liệu email
        // ------- Kiểm tra dữ liệu rỗng -------------
        if (empty($_POST['email'])) {
            $error['email'] = 'Tên email không được để trống';
        } else {
            // ---------------- Kiểm tra định dạng email ---------
            if (!is_email($_POST['email'])) {
                $error['email'] = 'Không đúng định dạng email';
            } else {
                $email = $_POST['email'];
            }
        }



        ###---------- Kết luận 
        if (empty($error)) {
            if (!user_exist($username, $email)) {
//                $active_token = md5($username . time());
                //    show_array($_POST);
                $data = array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'created_date' => time(),
                );
                add_user($data);
                $notifi['account'] = "Thêm tài khoản thành công";
            } else {
                $error['account'] = "Username or Email đã tồn tại trong hệ thống !!";
            }
        }
    }
    load_view('reg');
}
