@extends("admin.layout")
@section("title","新增產品")
@section("content")
<div class="admin-card">
    <div class="admin-card-header">
        <h2><i class="fa fa-box-open"></i>新增產品</h2>
        <a href="list" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i>返回列表</a>
    </div>
    <div class="admin-card-body">
        <form class="admin-form" action="store" method="post">
            @csrf
            @include("admin.product.product.form")
        </form>
    </div>

</div>

@endsection