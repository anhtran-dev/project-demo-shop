<?php

function construct(){
    load_model('productCat');
    load('lib', 'validation');
}
function indexAction(){
    $list_cat = get_list_product_cat();
    $data['list_cat'] = $list_cat;
    
    load_view('productCat',$data);
}
function addAction(){
    $error = array();
    $notifi = array();
    global $error, $notifi;
    if(isset($_POST['btn_add_cat'])){
        if(empty($_POST['title'])){
            $error['title'] = "Không được để trống tên danh mục";
        }
        else{
            if(title_exist($_POST['title'])){
                $error['title'] = "Tên danh mục sản phẩm đã tồn tại";
            }
            else{
                $cat_title = htmlentities($_POST['title']);
            }
        }
        
        #kết luận
        if(empty($error)){
            $data = array(
                'cat_title' => $cat_title,
            );
            addCat($data);
            $notifi['add_cat'] = "Thêm danh mục sản phẩm thành công";
        }
    }
    load_view('addCat');
}

function updateAction(){
    global $error,$notifi;
    $id = (int)$_GET['id'];
    if(isset($_POST['btn_update'])){
        if(empty($_POST['title'])){
            $error['title'] = "Không được để trống tên danh mục";
        }
        else{
            if(title_exist($_POST['title'])){
                $error['title'] = "Tên danh mục sản phẩm đã tồn tại";
            }
            else{
                $cat_title = htmlentities($_POST['title']);
                
            }
        }
        if(empty($error)){
            $data = array(
                'cat_title' => $cat_title,
            );
            updateProductCat($id,$data);
            $notifi['update']= "Cập nhật dữ liệu thành công";
        }
    }
    $product_cat = get_product_cat_by_id($id);
    $data['product_cat'] = $product_cat;
    load_view('updateCat',$data);
}

function deleteAction(){
    
    $id = (int)$_GET['id'];
    deleteCat($id);
    redirect_to("?mod=product&controller=productCat&action=index");
}