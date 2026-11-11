@extends('admin.layout')
@section('title', '修改大事記')
@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h2><i class="fa fa-history"></i> <span data-mode-text>新增大事記</span></h2>
        <a href="../list" class="btn btn-light btn-sm"><i class="fa fa-arrow-left"></i> 返回列表</a>
    </div>
    <div class="admin-card-body">
        <!-- 網址帶 ?id=編號 時為「修改」，會自動帶入資料 -->
        <form class="admin-form" action="../update" method="post">
            <input type="hidden" name="id" value="{{$ms->id}}">
            @csrf
            <div class="form-row-3">
                <div class="form-group">
                    <label class="form-label" for="f_year">年份 <span class="req">*</span></label>
                    <!-- <input type="number" id="f_year" name="year" value="2026" class="form-control" required> -->
                    <select name="year" id="f_year" class="form-control" require>
                        <option value="">請選擇年份</option>
                        @foreach(range(date("Y"),date("Y")-10) as $year)
                        <option value="{{$year}}" {{ $ms->years == $years ? 'selected' : ''}}>{{$year}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label class="form-label" for="f_month">月份</label>
                    <select id="f_month" name="month" class="form-control">
                        <option value="">請選擇月份</option>
                        @foreach(range(1,12) as $month)
                        <option value="{{str_pad($month,2,'0',STR_PAD_LEFT)}}" {{ $ms->months == $month ? 'selected' : ''}}>{{$month}} 月</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="f_tag_type">類型</label>
                    <select id="f_tag_type" name="typeId" class="form-control">
                        <option value="">請選擇類型</option>
                        @foreach($types as $data)
                        <option value="{{$data->id}}" {{ $ms->typeId == $data->id ? 'selected': ''}}>{{$data->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="f_title">標題 <span class="req">*</span></label>
                <input type="text" id="f_title" name="title" class="form-control" required value="{{ $ms->title}}">
            </div>
            <div class="form-group">
                <label class="form-label" for="f_description">說明</label>
                <textarea id="f_description" name="content" rows="3" class="form-control">{!! str_replace("<br/>","\n",$ms->content)!!}</textarea>
            </div>

            <div class="form-group">
                <label class="form-check"><input type="checkbox" name="point" value="Y" {{$ms->point == "Y" ? "checked":""}}> 重點事件（時間軸顯示金色圓點）</label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> 儲存</button>
                <a href="milestones.html" class="btn btn-outline"><i class="fa fa-times"></i> 取消</a>
            </div>
        </form>
    </div>
</div>
@endsection