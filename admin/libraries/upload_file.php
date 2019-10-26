<?php
if (isset($_POST['btn_upload'])) {
    $error = array();
     $upload_dir = "upload_images/";
     $upload_file = $upload_dir . $_FILES['file']['name'];
    #1.----------- Xử lí đúng file ảnh---------------
     // mảng những đuôi file được upload
    $type_allow = array('png', 'jpg','gif');
    // lấy đuôi file được upload
    $type_img = pathinfo($_FILES['file']['name'] ,PATHINFO_EXTENSION);
//    echo $type_img;
    
    
    // Nếu đuôi file lâý được không nằm trong mảng được cho phép
    if(!in_array(strtolower($type_img), $type_allow)){
        $error['file_type'] ="Đuôi file không đươc hỗ trợ";echo "<br>";
    }
    else {
       

        #2.-------------- kiểm tra kích thước file update (<20MB)-------------
        $file_size = $_FILES['file']['size'];
        echo "File size : {$file_size}";
        if($file_size > 20971520){
            $error['file_size'] = "Kích thước file phải < 20MB";
        }
        echo "<br>";

        #3.-------------- Kiếm tra trùng file name trên hệ thống-------------------
        
        if(file_exists($upload_file)){
            
            // ==== Xử lí đổi tên file tự động
            // File = tên file + đuôi file
            // Lấy tên file
//          
            $file_name = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
            
            // Tạo tên mới
            $new_file_name = $file_name.'-Copy.';
 
            // Tạo 1 đường dẫn mới
            // đường dẫn mới = thư mục chứa file ($upload_dir) + tên file mới + đuôi file
            $new_upload_file = $upload_dir.$new_file_name.$type_img;

            
            // Kiểm tra nếu file Copy đã tồn tại thì cần thêm số thứ tự sau để phân biệt
            // Copy(1) Copy(2) Copy(3)............Copy(k)
            // tạo vòng lặp để kiểm tra sự tồn tại file copy
            $k = 1;
            while(file_exists($new_upload_file)){
                // Tạo tên mới
                $new_file_name = $file_name."-Copy({$k}).";

                
                // Tạo 1 đường dẫn mới
                // đường dẫn mới = thư mục chứa file ($upload_dir) + tên file mới + đuôi file
                $new_upload_file = $upload_dir.$new_file_name.$type_img;
                $k++;

            }
            // Cập nhật lại đường dẫn mới cho file upload
            $upload_file = $new_upload_file;
                
        }
   
    }
    if(empty($error)){
        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
            $notifi['upload_file'] = "Upload file thành công";
  
        } else {
            $notifi['upload_file']  = "Upload file không thành công";
        }
    }
}
