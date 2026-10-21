<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    // 帳號列表
    public function list()
    {
        // 取得 manager 資料表中的全部資料
        $list = Manager::get();

        return view("admin.manager.list", compact("list"));
    }

    public function create()
    {
        return view("admin.manager.create");
    }

    //儲存新增的帳號
    public function store(Request $req)
    {
        //要new Manager產生新物件
        $manager = new Manager();
        //$Manager為manager資料表
        //$manager->userId為manager資料表中userId欄位
        //$req->userId為新增帳號網頁中所輸入的帳號
        $manager->userId = $req->userId;
        //$manager->pwd為pwd欄位,$req->pwd為新增帳號網頁中所輸入的密碼
        $manager->pwd = $req->pwd;
        //save():儲存 $manager->save()將所輸入的資料存入manager資料表中
        $manager->save();

        //通常新增完成要告知使用者已新增完成，這裡為了簡化流程暫時不處理
        return redirect("/manager/list");
    }
    //修改管理帳號
    public function edit(Request $req)
    {
        //find:尋找 Manager::find($req->id)在manager資料表中尋找所帶進來的id這筆資料
        $manager = Manager::find($req->id);
        //將所找到的資料傳給編輯帳號網頁
        return view("admin.manager.edit", compact("manager"));
    }

    //更新管理帳號
    public function update(Request $req)
    {
        // $req->id中的id為路由/manager/edit/{id}中的id,二個名稱要一樣
        //find:尋找 Manager::find($req->id)在manager資料表中尋找所帶進來的id這筆資料
        $manager = Manager::find($req->id);
        $manager->userId = $req->userId;
        $manager->pwd = $req->pwd;
        //update:更新，也可以用$manager->save()，這裡用update
        //通常要判斷所更新的帳號是否已存在資料表中，這裡先省略
        $manager->update();
        //轉址回到帳號列表,提示已經修改完成的動作已省略
        return redirect("/manager/list");
    }
}
