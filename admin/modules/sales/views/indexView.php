<?php get_header(); ?>

<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách đơn hàng</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                        <ul class="post-status fl-left">
                            <li class="all"><a href="">Tất cả <span class="count">(69)</span> đơn hàng</a></li>
                           
                        </ul>
                        <form method="GET" class="form-s fl-right">
                            <input type="text" name="s" id="s">
                            <input type="submit" name="sm_s" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="actions">
                        <form method="GET" action="" class="form-actions">
                            <select name="actions">
                                <option value="">Tác vụ</option>
                                
                                <option value="">Xóa đơn hàng</option>
                            </select>
                            <input type="submit" name="sm_action" value="Áp dụng">
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã đơn hàng</span></td>
                                    <td><span class="thead-text">Tên khách hàng</span></td>
                                    <td><span class="thead-text">Số sản phẩm</span></td>
                                    <td><span class="thead-text">Tổng giá</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Chi tiết đơn hàng</span></td>
                                    <td><span class="thead-text">Thao tác</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                    <td><span class="tbody-text">1</h3></span>
                                    <td><span class="tbody-text">WEB00001</h3></span>
                                    <td>
                                        <div class="tb-title fl-left">
                                            <a href="" title="">Phan Văn Cương</a>
                                        </div>
                                        

                                    </td>
                                    <td><span class="tbody-text">5</span></td>
                                    <td><span class="tbody-text">1.500.000 VNĐ</span></td>
                                    
                                    <td><span class="tbody-text">12-07-2016</span></td>
                                    <td><a href="?page=detail_order" title="" class="tbody-text">Chi tiết</a></td>
                                    <td><a href="" title="" class="tbody-text">Xóa</a></td>
                                </tr>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                    
                    <ul id="list-paging" class="fl-right">
                        <li>
                            <a href="" title=""><</a>
                        </li>
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                        <li>
                            <a href="" title="">></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>


