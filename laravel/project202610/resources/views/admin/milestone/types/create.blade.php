@extends('admin.layout')
@section('title', '新增大事記類別')
@section('content')
<div class="admin-card">
    <div class="admin-card-header">

        <h2>
            <i class="fa fa-user-shield"></i> <span data-mode-text>新增大事記類別</span>
        </h2>
        <a href="/admin/milestone/types/list" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> 返回列表</a>
    </div>
    <div class="admin-card-body">

        <form class="admin-form" action="/admin/milestone/types/store" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="label">標籤 <span class="req">*</span></label>
                    <input type="text" id="label" name="label" value="" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="title">標題<span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 儲存</button>
                <a href="/admin/milestone/types/list" class="btn btn-outline"><i class="fa fa-times"></i> 取消</a>
            </div>
        </form>
    </div>
</div>
@endsection