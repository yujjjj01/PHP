@extends("admin.layout")
@section("title","產品管理")
@section("content")
<div class="admin-card" data-crud-list>
    <div class="admin-card-header">
        <h2><i class="fa fa-image"></i>產品圖:{{$product->product_no}} {{$product->product_name}}</h2>
        <div class="admin-toolbar">
            <a href="../spec/list/{{$productId}}" class="btn btn-outline btn-sm"><i class=""></i></a>

        </div>

    </div>

</div>

@endsection