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

        <form data-login>
            <div class="form-group">
                <label class="form-label" for="username">帳號</label>
                <div class="input-icon-wrap">
                    <i class="fa fa-user-shield icon"></i>
                    <input type="text" id="username" name="username" class="form-control" required autofocus />
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