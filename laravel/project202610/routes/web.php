<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManagerController;
use Illuminate\Support\Facades\Route;

/*  
    所有的網址(超連結,href)或表單(form)都要在路由中設定
    Route:路由
    get:超連結
    'admin' : 也可以用雙引號 "admin",表示網址為http://127.0.0.1:8000/admin
    如果是正式網址,則為https://www.xxx.com.tw/admin
    https: SSL加密機制,保證在資料傳輸過程中將資料加密,不易被解析,阜號(port)為443

    如果是用Route::post,通常是表單送資料到網站
    AdminController::class,當網址為http://127.0.0.1:8000/admin時,會執行AdminController這個程式"index",AdminController要執行的功能(或函式,function)

    為何是AdminController? 這是自己設定的,也可以改用別的程式
*/

Route::get('/admin', [AdminController::class, "index"]);
//登入的網址,因為resources/views/admin/login.blade.php中form的method為post,所以要用Route::post
Route::post('/admin/login', [AdminController::class, "login"]); //登入

Route::get('/admin/home', [AdminController::class, "home"]); //後台首頁

Route::get('/manager/list', [ManagerController::class, "list"]); //帳號管理

Route::get("/manager/create", [ManagerController::class, "create"]);//新增帳號

Route::post("/manager/store", [ManagerController::class, "store"]);//儲存帳號

//{}:表示有帶資料進來,{id}中的id為變數名稱
//如果是{id?}有問號，表示可能有帶資料進來，也可能沒有帶資料進來
Route::get("/manager/edit/{id}", [ManagerController::class, "edit"]);//編輯帳號

Route::post("/manager/update", [ManagerController::class, "update"]);//更新帳號

Route::get("/manager/delete/{id}", [ManagerController::class, "delete"]);//刪除帳號

Route::post("/manager/checkAccount", [ManagerController::class, "checkAccount"]);//檢查帳號