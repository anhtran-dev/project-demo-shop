
<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý ISMART</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>

        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/delete.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div class="wp-inner clearfix">
                        <a href="?" title="" id="logo" class="fl-left">Quản trị</a>
                        <ul id="main-menu" class="fl-left">
                            <li>
                                <a href="?mod=page&controller=index&action=index" title="">Trang</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=page&controller=index&action=addPage" title="">Thêm mới</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=page&controller=index&action=index" title="">Danh sách trang</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?mod=post&controller=index&action=index" title="">Bài viết</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=post&controller=index&action=addPost" title="">Thêm mới</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=post&controller=index&action=index" title="">Danh sách bài viết</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=post&controller=postCat&action=index" title="">Danh mục bài viết</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?mod=product&controller=index&action=index" title="">Sản phẩm</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=product&controller=index&action=add" title="">Thêm mới</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=product&controller=index&action=index" title="">Danh sách sản phẩm</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=product&controller=productCat&action=index" title="">Danh mục sản phẩm</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?mod=sales&controller=index&action=index" title="">Bán hàng</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=sales&controller=index&action=index" title="">Danh sách đơn hàng</a> 
                                    </li>
<!--                                    <li>
                                        <a href="?mod=post&controller=customer&action=index" title="">Danh sách khách hàng</a> 
                                    </li>-->
                                </ul>
                            </li>
                            
                        </ul>
                        <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                            <button class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                
                                <h3 id="account" class="fl-right"><?php echo get_info_field_user($_SESSION['user_login'] ,$field = 'fullname'); ?></h3>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="?mod=users&action=index" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                                <li><a href="?mod=users&action=logout" title="Thoát">Thoát</a></li>
                            </ul>
                        </div>
                    </div>
                </div>