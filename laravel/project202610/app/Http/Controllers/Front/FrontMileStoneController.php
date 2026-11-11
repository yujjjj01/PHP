<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Milestone\MileStone;
use Illuminate\Http\Request;

class FrontMileStoneController extends Controller
{
    public function list()
    {
        $years = MileStone::distinct()->orderByDesc("years")->pluck("years");
        $list = MileStone::get();
        return view("front.milestone.list", compact("list","years"));
    }
}
