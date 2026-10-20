<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
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

    //後台登入Request:接收表單送過來的資料的物件 $req為變數名稱,可以自己用喜歡的名稱
    //Request:接收 Response:回應給使用者的資料
    public function login(Request $req)
    {
        //帳號,$req->userId為admin/login.blade.php中name="userId"
        $userId = $req->userId;
        //密碼,$req->password為admin/login.blade.php中name="password"
        //$pwd為接收密碼資料後暫存的名稱，名稱不一定要用password，可自己取名
        $pwd = $req->password;

        /*
            1.建立model:php artisan make:model Manager
            2.開啟app/Models/Manager.php,詳如Manager.php
            3.呼叫Manager中的方法，確認帳號及密碼是否存在
            4.如果帳號或密碼錯誤,回到上一頁,並帶回原本輸入的資料及錯誤訊息
            5.如果帳號及密碼均正確，則進入後台管理系統/admin/home
        */

        /*

            Manager是class(類別),要使用Manager中的function一定要先new Manager(建立物件)
            然後才能呼叫Manager中的方法，例如checkManager
            例:
            $manager = new Manager();
            $list = $manager->checkManager($userId,$pwd);

            上面二行可以合併成一行
            $list = (new Manager()->checkManager($userId,$pwd));

        */

        //檢查manager資料表中是否有相同的帳號及密碼
        $list = (new Manager())->checkManager($userId,$pwd);

        if(empty($list))
        {
                /*
                    empty:空的 empty($list)空的list,表示manager資料表中找不到所輸入的帳號及密碼相同者
                    back():回到上一頁
                    withInput():回到上一頁後,帶回錯誤訊息,msg:自行命名的名稱
                */
            return back()->withInput()->withErrors(["msg" =>"帳號密碼錯誤"]);
        }else{
            /*
                所輸入的帳號密碼正確
                session():暫存資料在伺服器
                put():設定
                session()->put("userId",$userId):將所輸入的帳號暫存在伺服器中,名稱為"userId"
            */
            
            session()->put("userId",$userId);
            //轉址到後台頁面
            return redirect("/admin/home");

        }
    }
}
