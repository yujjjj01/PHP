<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AIMileStone;
use Illuminate\Http\Request;

class AIMileStoneController extends Controller
{
    public function index(Request $req)
    {
        $keyword = $req->keyword;
        $list = [];

        if(!empty($keyword))
        {
            $list  = AIMileStone::search($keyword);

        }

        return view("front.milestone.ai",compact("keyword","list"));

    }
    
}
