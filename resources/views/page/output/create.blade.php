@extends('layouts.base')

@section('content')
<div class="container mt-5 pt-5">
  <div class="row">
    <div class="col-10">
      <div class="card">
        <div class="card-header">
          書籍名入力
        </div>
        <div class="card-body">
          <p class="card-text">入力された書籍名で新規にアウトプットを作成します。</p>
          <form method="POST" action="{{route("output.store")}}">
            @csrf
            <div class="form-group">
              <label for="title">書籍名</label>
              <input type="text" class="form-control" id="title" placeholder="書籍名を入力して下さい。" name="title" required>
            </div>
           
            <div class="text-right">
              <button type="submit" class="btn btn-primary">新規作成</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
