<?php

function construct(){
    load_model('postCat');
    load('lib', 'validation');
}
function indexAction(){
    $list_post_cat = get_list_post_cat();
//    show_array($list_post_cat);
    $data['list_post_cat'] = $list_post_cat;
    load_view('postCat',$data);
}

function addCatAction(){
    global $error, $notifi;
    if(isset($_POST['btn_add_cat'])){
        # Chuẩn hóa dữ liệu
        if(empty($_POST['title'])){
            $error['title'] ="Tiêu đề không được để trống";
            
        }
        else{
            // Kiếm tra thêm tiêu đề đã tồn tại chưa
            $title = htmlentities($_POST['title']);
        }
        #Kết luận
        if(empty($error)){
            $data = array(
                'title' => $title,
                'created_date' => time(),
                
            );
            addPostCat($data);
            $notifi['add_cat'] = "Thêm danh mục thành công";
        }
        
    }
    load_view('addCat');
}

function updatePostCatAction(){
    global $error, $notifi;
    $id = (int)$_GET['id'];
    if(isset($_POST['btn_update'])){
        if(empty($_POST['title'])){
            $error['title'] = "Tiêu đề danh mục không để trống";
        }
        else{
            if(title_exist($_POST['title'])){
               $error['title'] = "Tiêu đề danh mục đã tồn tại trong hệ thống"; 
            }
            else{
                $title = htmlentities($_POST['title']);
            }
        }
        #Kết luận
        if(empty($error)){
            $data= array(
                'title' => $title,
            );
            updateTitlePostCat($id,$data);
            $notifi['update'] ="Cập nhật dữ liệu danh mục thành công";
        }
    }
    $post_cat = get_post_cat_by_id($id);
    $data['post_cat'] = $post_cat;
    load_view('updatePostCat',$data);
}

function deletePostCatAction(){
    global $notifi;
    $id =(int)$_GET['id'];
    deletePostCat($id);
    redirect_to("?mod=post&controller=postCat&action=index");
}
function activeAction(){
    $id = (int)$_GET['id'];
    $data = array(
        'status' => 1,
    );
    activePostCat($id,$data);
    redirect_to("?mod=post&controller=postCat&action=index");
}