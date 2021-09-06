
<header class="bg-base">
  <nav class="navbar navbar-expand navbar-dark fixed-top d-none d-md-block bg-base">
    <div class="d-flex">
      <a class="nav-link text-white" href="{{ route('index') }}"><i class="fas fa-book mr-1 fa-lg"></i>読書アウトプット</a>
      <ul class="navbar-nav mr-auto d-flex">
        <li class="nav-item"><a class="nav-link" href="#"><i class="far fa-user-circle"></i>マイページ </a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="far fa-star"></i>お気に入り登録</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-history"></i>閲覧履歴</a></li>
      </ul>  

      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>ログイン / 新規登録</a></li>
      </ul>  
    </div> 
  </nav>
    
  <nav class="navbar navbar-expand-md navbar-dark fixed-top d-block d-md-none bg-base">
    <div class="d-flex justify-content-between">
      <a class="nav-link text-white" href="{{ route('index') }}"><i class="fas fa-book mr-1 fa-lg"></i>読書アウトプット</a>
      <button class="navbar-toggler menu-trigger" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span></span>
          <span></span>
          <span></span>
      </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="#"><i class="far fa-user-circle"></i>マイページ </a></li>  
        <li class="nav-item"><a class="nav-link" href="#"><i class="far fa-star"></i>お気に入り登録</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-history"></i>閲覧履歴</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>ログイン / 新規登録</a></li>
      </ul>
    </div>
  </nav>
</header>


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
  width: 40px;
  height: 34px;
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
  top: 15px;
}
.menu-trigger span:nth-of-type(3) {
  bottom: 0;
}

.menu-trigger.active span:nth-of-type(1) {
  transform: translateY(15px) rotate(-45deg);
}
.menu-trigger.active span:nth-of-type(2) {
  opacity: 0;
}
.menu-trigger.active span:nth-of-type(3) {
  transform: translateY(-15px) rotate(45deg);
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