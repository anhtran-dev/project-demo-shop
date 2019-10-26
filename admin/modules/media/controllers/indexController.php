<?php

function construct(){
    load_model('index');
    load('lib', 'paging');
}
function indexAction(){
    load_view('index');
}
function uploadAction(){
    
    load_view('index');
}
