<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //登入後台
    public function index()
    {
        /*
            回傳admin資料下的login網頁login的副檔名為.blade.php
            所有的網頁都在resource/view之下
            1.新增Admin/AdminController
            2.在Admin/AdminController新增index() function
            3.在resource/views新增admin資料夾
            4.在resource/views/admin資料夾新增login.blade.php檔案
            5.在routes/web.php 新增路由Route::get("/admin",[AdminController::class,"index"]);
            6.routes/web.php 要use App\Http\Controllers\Admin\AdminController
            7.在終端機啟動server:php artisan serve
            8.在瀏覽器輸入http://127.0.0.1:8000/admin即可看到後台登入頁面
            9.將原始網頁資料夾下的css及js資料夾，複製到public資料夾之下
        */
        return view("admin.login");
    }
}
