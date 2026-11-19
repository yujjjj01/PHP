<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\AiProduct;
use App\Models\Product\Product;
use App\Models\Product\ProductLabel;
use App\Models\Product\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminProductController extends Controller
{
    public function list()
    {
        $types = ProductType::get();
        $list = Product::with(["types","labels","photos"])->orderByDesc("id")->paginate(10);
        return view("admin.product.product.list",compact("types","list"));
    }

    public function create()
    {
        $types = ProductType::get();
        $labels = ProductLabel::get();
        return view("admin.product.product.create",compact("types","labels"));
    }

    public function doAI(Request $req)
    {
        if(empty($req->product_name) && empty($req->title) && empty($req->content))
            {
                return response()->json(["error"=>"請輸入產品名稱、標題或內容，AI才知道要提供什麼文案!!"]);
            }

            $result = AiProduct::suggest($req->product_name,$req->title,$req->content);
            return response()->json($result);
    }

    public function fill(Product $product,Request $req)
    {
        $content = $req->content;
        if(!empty($content))
            {
                $content = str_replace("\n","<br/>",$content);
            }
        $product->label_id = $req->label_id;
        $product->type_id = $req->type_id;
        $product->product_name = $req->product_name;
        $product->title = $req->title;
        $product->product_no = $req->product_no;
        $product->price = $req->price;
        $product->sale_price = $req->sale_price ?? $req->price;
        $product->qty = $req->qty ?? null;
        $product->content = $content;
    }

    public function store(Request $req)
    {
        $product = new Product();
        $this->fill($product,$req);
        $product->save();

        Session::flash("message","已新增，可以繼續上傳產品圖及建立產品規格");
        return redirect("/admin/product/photo/list/".$product->id);
    }
}
