<!--
1.請用visual studio code 或文字編輯器
2.打開給你們的網頁原始檔admin/login.html
3.按Ctrl+A鍵, 全選
4.按Ctrl+C鍵, 複製
5.點選resources/views/admin/login.blade.php
6.按Ctrl+V鍵, 貼上
7.將css及javascript的路徑全部改為從根目錄(/)開始
href="../css/style.css" 改為href="/css/style.css"
src="../js/main.js" 改為 src="/js/main.js"
src="../js/admin.js" 改為 src="/js/admin.js"
-->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>後台登入 — 品牌名稱 管理系統</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400;500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <!-- 前台與後台共用同一份 CSS -->
  <link rel="stylesheet" href="/css/style.css" />
</head>
<body class="admin-login">
  <div class="auth-card">
    <div class="auth-logo"><div class="logo-box">B</div><span>品牌名稱</span></div>
    <div class="auth-title">
      <h2>後台管理系統</h2>
      <!-- 這是html的註解 -->
       {{-- 
          這是laravel blade 的註解
          msg: 由AdminController login function回傳的錯誤訊息名稱
          在blade中的條件判斷式、廻圈..等都要有結束符號
          例如 if endif, for endfor, foreach endforeach, section endsection
          其他程式語言則為  if{}、for{}、foreach{}、while{}...
       --}}
      <p>@if ($errors->has("msg"))
          <font color="red">{{ $errors->first("msg") }}</font>
        @endif
      </p>
    </div>

    <!--
        setp1: 
        action: 資料輸入後到送到哪個網址
        method: 送出的方法, 通常只會有get及post, laravel還另有put, patch, delete三個方法
        表單一般用post, 可傳大量資料,且不會出現在網址列, 較安全
        所有要送出的資料欄位都要寫在<form>與</form>之間
        @csrf: 權杖(token), 在laravel中所有表單都要加上@csrf, 表示是由自己網站所送出的
        不是由他人在遠端送出資料,保障網站的安全
        @csrf會自動轉換如下:
        <input type="hidden" name="_token" value="xxxxxxxxxxxxxxxxxxx" autocomplete="off">

        step2: 要在路由中設定Route::post("/admin/login", [AdminControler:class, "login"]);
        為何要用Route::post, 因為form method="post"
        step3: 要在AdminControler中新增public function login()
    -->
    <form action="/admin/login" method="post">
        @csrf
      <div class="form-group">
        <label class="form-label" for="username">帳號</label>
        <div class="input-icon-wrap">
          <i class="fa fa-user-shield icon"></i>
          <!-- name:後端接收資料用的名稱 id是給瀏覽器或javascript控制用的
            required: 使用jquery的必填
            autofocus: 自動取得焦點, 游標會自動停佇在這裡
            class="form-control", bootstrap中輸入框的css
            value:這個欄位所輸入的值
            old:原本輸入的文字
          -->
          <input type="text" id="username" name="userId" class="form-control" required autofocus value="{{ old('userId') }}"/>
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
    <div class="auth-footer"><a href="../index.html"><i class="fa fa-arrow-left"></i> 回到前台</a></div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="/js/main.js"></script>
  <script src="/js/admin.js"></script>
</body>
</html>
