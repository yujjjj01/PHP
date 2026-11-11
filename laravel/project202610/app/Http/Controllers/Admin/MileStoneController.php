<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MileStone\MileStone;
use App\Models\MileStoneType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MileStoneController extends Controller
{
    //大事記列表
    public function list()
    {

        $list = MileStone::paginate(10); //每頁顯示10筆資料
        return view("admin.milestone.list", compact("list"));
    }
    public function add()
    {
        $types = MileStoneType::get();
        return view("admin.milestone.add",compact("types"));
    }

    public function store(Request $req)
    {
        $content = $req->content;
        if(!empty($content))
        {
            $content = str_replace("\n","<br/>",$content);
        }
        $ms = new MileStone();
        $ms ->typeId = $req->typeId;
        $ms ->years = $req->year;
        $ms ->months = $req->month;
        $ms ->title = $req->title;
        $ms ->content = $content;
        $ms ->point = $req->point;
        $ms ->save();

        Session::flash("message","已新增");
        return redirect("/admin/milestone/list");


    }
}
