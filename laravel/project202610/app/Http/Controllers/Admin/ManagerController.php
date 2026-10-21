<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Manager;

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
}
