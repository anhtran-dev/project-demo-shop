<?php

function construct() {
    load_model('index');
    load('lib', 'validation');
    load('lib', 'send_mail');
}
function indexAction() {
    $user_login = $_SESSION['user_login'];
    $info_user = get_info_user_by_username($user_login);
    $data['info_user'] = $info_user;
    load_view('index', $data);
}
function loginAction() {
    global $error, $username, $password;
    if (isset($_POST['btn_login'])) {
        // Đặt mảng lưu lỗi
        $error = array();
        #1. chuẩn hóa dữ liệu username
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

        #2. chuẩn hóa dữ liệu password
        // ------- Kiểm tra dữ liệu rỗng -------------
        if (empty($_POST['password'])) {
            $error['password'] = 'Tên password không được để trống';
        } else {
            // ----------Kiểm tra độ dài username -----------------
            if (!(strlen($_POST['password']) > 6) && (strlen($_POST['password']) < 32)) {
                $error['password'] = 'Password phải lớn hơn 6 kí tự và nhỏ hơn 32 kí tự';
            } else {
                // ---------------- Kiểm tra định dạng username ---------
                if (!is_password($_POST['password'])) {
                    $error['password'] = 'Password phải bắt đầu bằng kí tự viết hoa ,chỉ sử dụng các kí tự từ A-Za-z0-9 và dấu gạch dưới và các kí tự .!@#$%^&*()';
                } else {
                    $password = md5($_POST['password']);
                }
            }
        }

        #3. Kết luận 
        if (empty($error)) {

            if (check_login($username, $password)) {

                // Lưu trũ phiên đăng nhập
                $_SESSION['is_login'] = true;
                $_SESSION['user_login'] = $username;
                if (isset($_POST['remember_me'])) {
                    setcookie('is_login', true, time() + 864000, '/');
                    setcookie('user_login', $username, time() + 864000, '/');
                }

                // chuyển hướng về trang chủ

                redirect_to("?");
            } else {
                $error['account'] = "Username or password không chính xác !!";
            }
        }
    }
    load_view('login');
}



function logoutAction() {
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    setcookie('is_login', true, time() - 864000, '/');
    setcookie('username', $username, time() - 864000, '/');
    redirect_to("?mod=users&controller=index&action=login");
}

function regAction() {
    global $error, $fullname, $username, $password, $email, $gender;

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

        #4. chuẩn hóa dữ liệu select
        if ($_POST['gender'] == '') {
            $error['gender'] = 'Vui lòng chọn giới tính';
        } else {
            $gender = $_POST['gender'];
        }

        ###---------- Kết luận 
        if (empty($error)) {
            if (!user_exist($username, $email)) {
                $active_token = md5($username . time());
                //    show_array($_POST);
                $data = array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'gender' => $gender,
                    'active_token' => $active_token,
                    'reg_date' => time(),
                );
                add_user($data);
                $link_active = base_url("?mod=users&action=active&active_token={$active_token}");
                $content = "<p>Chào bạn {$fullname}</p>"
                        . "<p>Vui lòng click vào đường dẫn này để kích hoạt tài khoản:{$link_active}</p>"
                        . "<p>Nếu không phải bạn đăng kí tài khoản vui lòng bỏ qua email này</p>"
                        . "<p>Nếu trong vòng 24h tài khoản không được kích hoạt, tài khoản sẽ bị xóa</p>"
                        . "<p>Thank you!!</p>";
                send_mail('anhtran.limited@gmail.com', 'Anh Trần', 'Kích hoạt tài khoản', $content);

                redirect_to("?mod=users&action=active");
            } else {
                $error['account'] = "Username or Email đã tồn tại trong hệ thống !!";
            }
        }
    }
    load_view('reg');
}



function resetAction() {
    global $error, $email, $new_password;
    // nếu người dùng đã click vào link yêu cầu khôi phục mật khẩu
    if (isset($_GET['reset_pass_token'])) {
        $reset_pass_token = $_GET['reset_pass_token'];
        # Nếu tồn tại mã token trong database
        if (check_reset_pass_token($reset_pass_token)) {
            if (isset($_POST['btn_new_pass'])) {
                #chuẩn hóa dữ liệu password
                // ------- Kiểm tra dữ liệu rỗng -------------
                if (empty($_POST['new_password'])) {
                    $error['new_password'] = 'Tên password không được để trống';
                } else {
                    // ----------Kiểm tra độ dài password -----------------
                    if (!(strlen($_POST['new_password']) > 6) && (strlen($_POST['new_password']) < 32)) {
                        $error['new_password'] = 'Password phải lớn hơn 6 kí tự và nhỏ hơn 32 kí tự';
                    } else {
                        // ---------------- Kiểm tra định dạng password ---------
                        if (!is_password($_POST['new_password'])) {
                            $error['new_password'] = 'Password phải bắt đầu bằng kí tự viết hoa ,chỉ sử dụng các kí tự từ A-Za-z0-9 và dấu gạch dưới và các kí tự .!@#$%^&*()';
                        } else {
                            $new_password = md5($_POST ['new_password']);
                        }
                    }
                }
                #chuẩn hóa dữ liệu nhập lại password
                if ($_POST['re_new_password'] != $_POST['new_password']) {
                    $error['re_new_password'] = "Mật khẩu không khớp với trên";
                }

                #Kết luận
                if (empty($error)) {
                    update_password($new_password, $reset_pass_token);
                    redirect_to("?mod=users&action=resetOk");
                } else {
                    
                }
            }
        }
        load_view('newPass');
    }

    // Nếu người dùng mới click vào quên mật khẩu
    else {
        if (isset($_POST['btn_reset'])) {
//        chuẩn hóa dữ liệu email
            // ------- Kiểm tra dữ liệu rỗng -------------
            if (empty($_POST['email'])) {
                $error['email'] = 'Tên email không được để trống';
            } else {
                // ---------------- Kiểm tra định dạng email ---------
                if (!is_email($_POST ['email'])) {
                    $error['email'] = 'Không đúng định dạng email';
                } else {
                    $email = $_POST['email'];
                }
            }

            # Kết luận
            if (empty($error)) {
                // Kiểm tra email nhập vào có tồn tại trong database
                if (check_email($email)) {
                    #Tạo mã token
                    $reset_pass_token = md5($email . time());
                    #Update mã token vào database theo $email
                    update_reset_pass_token($reset_pass_token, $email);
                    #Tạo link, $content để gửi cho $email người dùng
                    $link_reset_pass = base_url("?mod=users&action=reset&reset_pass_token={$reset_pass_token}");
                    $content = "<p>Chào bạn </p>"
                            . "<p>Vui lòng click vào đường dẫn này để xác nhận thông tin thiết lập lại mật khẩu tài khoản:{$link_reset_pass}</p>"
                            . "<p>Nếu không phải bạn yêu cầu lấy lại mật khẩu vui lòng bỏ qua email này</p>"
                            . "<p>Thank you</p>";
                    send_mail($email, '', 'Khôi phục mật khẩu', $content);
                    load_view("notifiResetPass");
                } else {
                    $error['email'] = "Email không tồn tại trong hệ thống";
                }
            }
        }
    }


    load_view('reset');
}

function updateAction() {
    global $error, $notifi;
    if (isset($_POST['btn_update'])) {
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
            $user_login = $_SESSION['user_login'];
            $data = array(
                'fullname' => $fullname,
                'phone_number' => $phone_number,
                'address' => $address,
            );
            update_user_login($user_login, $data);
            $notifi['update'] = "Cập nhật thông tin tài khoản thành công";
        }
    }
    
    $username = $_SESSION['user_login'];
    $info_user = get_info_user_by_username($username);
    $data['info_user'] = $info_user;
    load_view('update',$data);
}

function changePassAction() {
    global $error, $new_password,$notifi;
    if (isset($_POST['btn_change_pass'])) {
        #Chuẩn hóa dữ liệu form
        #mật khẩu cũ
        if (empty($_POST['old_pass'])) {
            $error['old_pass'] = 'Không được để trống mật khẩu';
        } else {
            $old_pass = $_POST['old_pass'];
        }
        #mật khẩu mới
        if (empty($_POST['new_password'])) {
            $error['new_password'] = 'Tên password không được để trống';
        } else {
            // ----------Kiểm tra độ dài password -----------------
            if (!(strlen($_POST['new_password']) > 6) && (strlen($_POST['new_password']) < 32)) {
                $error['new_password'] = 'Password phải lớn hơn 6 kí tự và nhỏ hơn 32 kí tự';
            } else {
                // ---------------- Kiểm tra định dạng password ---------
                if (!is_password($_POST['new_password'])) {
                    $error['new_password'] = 'Password phải bắt đầu bằng kí tự viết hoa ,chỉ sử dụng các kí tự từ A-Za-z0-9 và dấu gạch dưới và các kí tự .!@#$%^&*()';
                } else {
                    $new_password = $_POST['new_password'];
                }
            }
        }
        #xác nhận mật khẩu mới
        if (!($_POST['confirm_pass']) == $new_password) {
            $error['confirm_pass'] = 'Mật khẩu không khớp với mật khẩu mới';
        }

        #Kết luận
        if (empty($error)) {
            $user_login = $_SESSION['user_login'];
            if (check_old_pass($user_login,md5($old_pass))) {
                $user_login = $_SESSION['user_login'];
                $data = array(
                    'password' => md5($new_password),
                );
                updatePassword($user_login, $data);
                $notifi['change_pass'] = "Thay đổi mật khẩu tài khoản thành công";
            }
            else{
                $error['old_pass'] = "Mật khẩu không đúng !! Vui lòng nhập lại";
            }
        }
    }
    load_view('changePass');
}
