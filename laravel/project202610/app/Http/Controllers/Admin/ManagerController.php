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
}
