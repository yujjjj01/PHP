@extends("front.layout")
@section("title","AI大事記")
@section("content")
<div class="section-lg">
    <div class="container container-narrow">
        <h2><i class="fa fa-robot"></i>AI 大事記</h2>
        <form method="get" action="/ai" style="margin: 20px 0;display:flex">
            @csrf
            <input type="text" name="keyword" class="form-control" value="{{$keyword}}" required>
            <button type="submit" class="btn btn-primary">查詢</button>
        </form>
        @if (!empty($keyword) && count($list)==0)
            <div class="alert alert-danger">查無資料，或AI呼叫失敗</div>
        @endif

        @if (count($list)>0)
        <h3>{{$keyword}}的大事記</h3>
        <table style="width: 100%; border-collapse:collapse">
            <tr style="background: #dddddd;">
                <th style="width: 10%;">年份</th>
                <th style="width: 60%;">標題</th>
                <th style="width: 30%;">內容</th>
            </tr>
            @foreach($list as $data)
                <tr>
                    <td class="text-center">{{ $data["year"] ?? "" }}</td>
                    <td class="text-center">{{ $data["title"] ?? "" }}</td>
                    <td class="text-center">{{ $data["content"] ?? "" }}</td>
                </tr>
            @endforeach
        </table>
        @endif
    </div>
</div>
@endsection