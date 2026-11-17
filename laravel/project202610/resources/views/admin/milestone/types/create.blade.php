@extends("admin.layout")
@section("title", "新增大事記類別")
@section("content")
<div class="admin-card">
    <div class="admin-card-header">
        <!-- 2026.10.28 14:16修改-->
        <h2><i class="fa fa-user-shield"></i>
            <span data-mode-text>新增大事記類別</span>
        </h2>
        <!-- 2026.10.28 14:16修改-->
        <a href="/admin/milestone/types/list" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> 返回列表</a>
    </div>
    <div class="admin-card-body">
        <!-- 2026.10.28 14:17修改
                        接下來
                        1.在MileStoneTypeController中新增store function
                        2.在路由中新增Route::post("/admin/milestone/types/store", [MileStoneTypeController::class, "store"]) 
                        3.新增完成後要告知使用者已經新增完成
                        4.告知提示會用到sweetalert2, 要在列表中(list.blade.php)引入sweetalert2的css及javascript
                    -->
        <form class="admin-form" action="/admin/milestone/types/store" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="label">標籤 <span class="req">*</span></label>
                    <input type="text" id="label" name="label" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="title">標題 <span class="req">*</span></label>
                <div class="input-icon-wrap">
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 儲存</button>
                <a href="/admin/milestone/types/list" class="btn btn-outline">
                    <i class="fa fa-times"></i> 取消
                </a>
            </div>
        </form>
    </div>
</div>
@endsection