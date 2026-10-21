<!--帳號列表-->

<div><a href="create">新增</a></div>
<table width-"100">
    <tr>
        <td>帳號</td>
        <td>密碼</td>
        <td>修改</td>
        <td>刪除</td>
    </tr>
    {{--
        foreach:對所有資料
        $list:由ManagerController的list function中傳過來的所有帳號資料
        $list as $data: 對於帳號的每一筆資料均由$data來表示
        $data->userId: userId為manager資料表中的userId欄位名稱
        $data->pwd: pwd為manager資料表中的pwd欄位名稱
        在php中->表示[的]意思,如同在java中用
        foreach開始,要有endforeach結束
    --}}
    @foreach($list as $data)
    <tr>
        <td>{{$data->userId}}</td>
        <td>{{$data->pwd}}</td>
        <td><a href="/manager/edit/{{$data->id}}">修改</a></td>
        <td><a href="/manager/delete/{{$data->id}}">刪除</a></td>
    </tr>
    @endforeach
</table>