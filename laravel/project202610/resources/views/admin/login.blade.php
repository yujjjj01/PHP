<!--
1.用vscode
2.打開網頁原始檔admin/login.html
3.複製到resource/views/admin/login.blade.php
4.將css及js的路徑全部改為從根目錄(/)開始，...要刪掉在Line20,54,58,59
-->


<!DOCTYPE html>
<html lang="zh-Hant">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>後台登入 — AI輔助全端班管理系統</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- 前台與後台共用同一份 CSS -->
    <link rel="stylesheet" href="/css/style.css" />
</head>

<body class="admin-login">
    <div class="auth-card">
        <div class="auth-logo">
            <div class="logo-box">B</div><span>AI輔助全端班</span>
        </div>
        <div class="auth-title">
            <h2>後台管理系統</h2>
            <p>請使用管理員帳號登入（示範：admin / admin1234）</p>
        </div>
        <!--
        step1:
            action: 資料輸入後送到哪個網址
            method: 送出的方法，通常只會有get及post，laravel還另有put,patch,delete三個方法
            表單一般用post，可傳大量資料，且不會出現在網址列，較安全
            所有要送出的資料欄位都要寫在<form>與</form>之間
            @csrf: 權杖(token)，在laravel中所有表單都要加上@csrf,表示是由自己網站所送出去的不是由他在遠端送出資料，保障網路安全
            @csrf會自動轉換如下:
            <input typre="hidden" name="_token" value="xxxxxxxxx" autocomplete="off">
        
        step2:要在路由中設設定Route::post("/admin/login",[AdminController:class,"login]);
        為何要用Route::post,因為form method="post"

        step3:要在AdminController中新增public function login()
        -->

        <form action="admin/login" method="post">
            @csrf
            <div class="form-group">
                <label class="form-label" for="username">帳號</label>
                <div class="input-icon-wrap">
                    <i class="fa fa-user-shield icon"></i>
                    <!--
                    name:後端接收資料用的名稱 id是給瀏覽器或javascript控制用的
                    required: 使用jquery的必填
                    autofocus: 自動取得對焦點,游標會自動停佇在這裡
                    clss = "form-control",bootstrap中輸入框的css
                    -->
                    <input type="text" id="username" name="userId" class="form-control" required autofocus />
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="password">密碼</label>
                <div class="input-icon-wrap">
                    <i class="fa fa-lock icon"></i>
                    <input type="password" id="password" name="password" class="form-control" required />
                    <span class="pw-toggle" onclick="togglePw('password',this)"><i class="fa fa-eye"></i></span>
                </div>
            </div>
            <div class="form-group">
                <label class="form-check"><input type="checkbox" name="remember" value="1" /> 記住我</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in-alt"></i> 登入後台</button>
        </form>
        <div class="auth-footer"><a href="/index.html"><i class="fa fa-arrow-left"></i> 回到前台</a></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/main.js"></script>
    <script src="/js/admin.js"></script>
</body>

</html>