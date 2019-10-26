<?php

// danh sách page
function get_list_page() {
    $list_item = db_fetch_array("SELECT * FROM `tbl_pages`");
    foreach ($list_item as &$item) {
        $item['update'] = "?mod=page&acontroller=index&action=update&id={$item['page_id']}";
        $item['delete'] = "?mod=page&acontroller=index&action=delete&id={$item['page_id']}";
    }
    return $list_item;
}

// người tạo page
function get_creator_page() {
    return db_fetch_row("SELECT `tbl_users_admin`.* "
            . "FROM `tbl_users_admin` RIGHT JOIN `tbl_pages`"
            . "ON `tbl_users_admin`.`user_id` = `tbl_pages`.`user_id`");
}

function addPage($data) {
    return db_insert('tbl_pages', $data);
}

function deletePage($id) {
    return db_delete('tbl_pages', "`page_id` = {$id}");
}

function get_list_page_by_id($id){
    return db_fetch_row("SELECT * FROM `tbl_pages` WHERE `page_id` = {$id}");
}

function updatePage($id,$data){
    return db_update('tbl_pages', $data, "`page_id`={$id}");
}

function get_info_search($data){
    return db_fetch_array("SELECT * FROM `tbl_pages` WHERE `page_title` LIKE '%{$data}%'");
}

// xóa phần tử được chọn bởi checkbox
function deletePage_by_check($list_check){
    
    return db_delete('tbl_pages', " `page_id` IN ({$list_check})");
}