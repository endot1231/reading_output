<template>
  <header class="bg-base header_height">
    <div class="container">
      <div class="row pt-3 text-white">
        <div class="col-4 title">
          <i class="fas fa-book mr-1 fa-lg"></i>読書アウトプット
        </div>
        <div class="col-8 text-right login">
          <RouterLink to="/login" class="text-white">ログイン / 新規登録</RouterLink>
        </div>
      </div>
    </div>
  </header> 
</template>

<style scoped>
.header_height{
  height: 48px;
}

.title{
  font-size:14px;
}

.login{
  font-size:14px;
}
</style>