
<header class="bg-base">
  <nav class="navbar navbar-expand navbar-dark fixed-top d-none d-md-block bg-base">
    <div class="d-flex">
      <a class="nav-link text-white" href="{{ route('index') }}"><i class="fas fa-book mr-1 fa-lg"></i>読書アウトプット</a>
      <ul class="navbar-nav mr-auto d-flex">
        <!-- ログイン後 -->
        @auth
        <li class="nav-item"><a class="nav-link" href="{{route('output.create')}}"><i class="far fa-edit"></i>書く</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('mypage.show',['mypage'=>Auth::id()])}}"><i class="far fa-user-circle"></i>マイページ </a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('history')}}"><i class="fas fa-history"></i>閲覧履歴</a></li>
        @endauth

        <!-- ログイン前 -->
        @guest
        <li class="nav-item" data-toggle="modal" data-target="#myModal"><span class="nav-link" style="cursor: pointer;">
          <i class="far fa-edit"></i>書く </span></li>
        <li class="nav-item" data-toggle="modal" data-target="#myModal"><span class="nav-link" style="cursor: pointer;">
          <i class="far fa-user-circle"></i>マイページ </span></li>
        <li class="nav-item" data-toggle="modal" data-target="#myModal"><span class="nav-link" style="cursor: pointer;">
          <i class="fas fa-history"></i>閲覧履歴 </span></li>
        @endguest
      </ul>  

      <ul class="navbar-nav">
        @auth
        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">
          <i class="fas fa-sign-in-alt fa-rotate-180"></i>ログアウト</a></li>
        @endauth
  
        @guest
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">
          <i class="fas fa-sign-in-alt"></i>ログイン / 新規登録</a></li>
        @endguest
      </ul>  
    </div> 
  </nav>
    
  <nav class="navbar navbar-expand-md navbar-dark fixed-top d-block d-md-none bg-base">
    <div class="d-flex justify-content-between">
      <a class="nav-link text-white" href="{{ route('index') }}"><i class="fas fa-book mr-1 fa-lg"></i>読書アウトプット</a>
      <button class="navbar-toggler menu-trigger mt-2" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span></span>
          <span></span>
          <span></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <!-- ログイン後 -->
        @auth
        <li class="nav-item"><a class="nav-link" href="{{route('output.create')}}"><i class="far fa-edit"></i>書く</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('mypage.show',['mypage'=>Auth::id()])}}"><i class="far fa-user-circle"></i>マイページ </a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('history')}}"><i class="fas fa-history"></i>閲覧履歴</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-in-alt fa-rotate-180"></i>ログアウト</a></li>
        @endauth

        <!-- ログイン前 -->
        @guest
        <li class="nav-item" data-toggle="modal" data-target="#myModal"><span class="nav-link" style="cursor: pointer;">
          <i class="far fa-edit"></i>書く </span></li>
        <li class="nav-item" data-toggle="modal" data-target="#myModal"><span class="nav-link" style="cursor: pointer;">
          <i class="far fa-user-circle"></i>マイページ </span></li>
        <li class="nav-item" data-toggle="modal" data-target="#myModal"><span class="nav-link" style="cursor: pointer;">
          <i class="fas fa-history"></i>閲覧履歴 </span></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">
          <i class="fas fa-sign-in-alt"></i>ログイン / 新規登録</a></li>
        @endguest
      </ul>
    </div>
  </nav>
</header>

@guest
<div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgba(0,0,0,.03);">
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる"><span aria-hidden="true"
            　id="loginFrom_close">&times;</span></button>
      </div>

      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-10 offset-1">
            <p>各種機能の利用にはログインが必要です。</p>
              <div class="col">
                <a href="{{ route('login')}}" class="btn col mt-3 p-2" style="color: #597594;border: 1px #597594 solid">
                <span>ログイン</span></a>
              </div>

              <div class="col">
                <a href="{{ route('register')}}" class="btn col mt-3 p-2 text-white" style="background:#597594">
                <span>新規登録</span></a>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endguest


@push('javascript')
<script type="text/javascript">
$('.menu-trigger').on('click',function (e) {
  $(this).toggleClass('active');
});
</script>
@endpush

@push('css')
<style type="text/css">
.header_height{
  height: 58px;
}

.navbar-dark .navbar-toggler {
  border-color: rgba(0, 0, 0, 0);
  outline: none;
}
 
.menu-trigger,
.menu-trigger span {
  display: inline-block;
  transition: all .4s;
  box-sizing: border-box;
}
.menu-trigger {
  position: relative;
  width: 30px;
  height: 24px;
  background: none;
  border: none;
  appearance: none;
  cursor: pointer;
}
.menu-trigger span {
  position: absolute;
  left: 0;
  width: 100%;
  height: 4px;
  background-color: #fff;
  border-radius: 4px;
}
.menu-trigger span:nth-of-type(1) {
  top: 0;
}
.menu-trigger span:nth-of-type(2) {
  top: 10px;
}
.menu-trigger span:nth-of-type(3) {
  bottom: 0;
}

.menu-trigger.active span:nth-of-type(1) {
  transform: translateY(10px) rotate(-45deg);
}
.menu-trigger.active span:nth-of-type(2) {
  opacity: 0;
}
.menu-trigger.active span:nth-of-type(3) {
  transform: translateY(-10px) rotate(45deg);
}

.title{
  font-size:14px;
  font-weight: bold;
  width: 120px;
}

.login{
  font-size:14px;
}
</style>
@endpush