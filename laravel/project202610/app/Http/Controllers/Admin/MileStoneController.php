<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone\MileStone;
use App\Models\Milestone\MileStoneType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MileStoneController extends Controller
{
    // 大事記列表
    public function list()
    {
        // paginate:分頁 paginate(10)每10筆為一頁
        /*
            開啟app/Providers/AppServiceProvider.php
            在 boot()中加上
            Paginator::useBootstrap();
            在amin.milestone.list.blade.php中foreach廻圈結束後加上$list->links()分頁
            $list:是渲染到網頁中的物件陣列變數名稱
        */ 
        $list = MileStone::paginate(10);
        return view("admin.milestone.list", compact("list"));
    }

    public function add()
    {
        $types = MileStoneType::get();
        return view("admin.milestone.add", compact("types"));
    }

    public function store(Request $req)
    {
        // 內容(說明)
        $content = $req->content;
        // 如果不是空的
        if (!empty($content))
        {
            /*
                str_replace:取代
                \n: 輸入框的換行(Enter) \n:new line
                將輸入框的換行取代為網頁的換行
            */
            $content = str_replace("\n", "<br/>", $content);
        }
        $ms = new MileStone();
        $ms->typeId = $req->typeId;
        $ms->years = $req->year;
        $ms->months = $req->month;
        $ms->title = $req->title;
        $ms->content = $content;
        $ms->point = $req->point;
        $ms->save();

        Session::flash("message", "已新增");
        return redirect("/admin/milestone/list");
    }

    public function edit(Request $req)
    {
        $ms = MileStone::find($req->id);
        $types = MileStoneType::get();
        return view("admin.milestone.edit", compact("ms", "types"));
    }

    public function update(Request $req)
    {
        // 內容(說明)
        $content = $req->content;
        // 如果不是空的
        if (!empty($content))
        {
            $content = str_replace("\n", "<br/>", $content);
        }
        $ms = MileStone::find($req->id);
        $ms->typeId = $req->typeId;
        $ms->years = $req->year;
        $ms->months = $req->month;
        $ms->title = $req->title;
        $ms->content = $content;
        $ms->point = $req->point;
        $ms->save();

        Session::flash("message", "已修改");
        return redirect("/admin/milestone/list");
    }

    public function delete(Request $req)
    {
        MileStone::destroy($req->id);
        Session::flash("message", "已刪除");
        //return redirect("/admin/milestone/list");
        return redirect()->route("mile"); // 使用路由中的name("mile")
    }
}
