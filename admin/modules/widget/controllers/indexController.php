<?php

function construct(){
    load_model('index');
}
function indexAction(){
    load_view('index');
}

function addAction(){
    load_view('add');
}