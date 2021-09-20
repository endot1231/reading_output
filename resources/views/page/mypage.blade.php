@extends('layouts.base')

@section('content')
<div class="container mt-5 pt-5 border">
    <div class="row justify-content-between">

        <div class="text-right col-12">
          @auth
            @if($user->id == Auth::id())
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#setting">
              <i class="fas fa-cog"></i>
            </button>
            @endif
          @endauth
        </div>

        <div class="text-center col-12">
            <img class="mb-3 mypage_image border mx-auto img-fluid" src="{{ $user->profile->url }}" />
        </div>
    </div>
    
    <div class="row">
        <div class="col pt-2 text-center">
            <h5 class="font-weight-bold">{{$user->name}}</h5>
        </div>
    </div>
    
    <div class="row profile_comment ml-auto mr-auto">
      <p>{!! nl2br(e($user->comment)) !!}</p>
    </div>
</div>

<div class="modal fade" id="setting" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="label1">
    <div class="modal-dialog" role="document">
        <div class="modal-content"> 
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">プロフィール編集</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる"><span aria-hidden="true"　id="postFrom_close">&times;</span></button>
            </div>
        
            <div id="myTabContent" class="tab-content mt-3">
                <div id="music" class="tab-pane active" role="tabpanel" aria-labelledby="music-tab">
                    <div class="modal-body">
                        <form class="px-4 py-1" id="profile_form">
                            {{ csrf_field() }}
                            <div class="myprofile_img_box setting_img">
                                <img class="profile_img mb-5" src="{{ $user->profile->url }}" id="preview" />
                                <label class="myprofile_img_button">
                                    <i class="fas fa-camera fa-inverse"></i>
                                    <input type="file" style="display:none" id="profile_img_button" name="profile_img">
                                </label>
                            </div>
            
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1">名前</label>
                            <p id="profile_name_error" class="errors"></p>
                            <input type="text" class="form-control profile_name" autofocus name="profile_name"
                                value="{{$user->name}}"> 
                            </div>
            
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1">自己紹介</label>
                            <p id="profile_comment_error" class="errors"></p>
                            <textarea class="form-control profile_comment" name="profile_comment" style="white-space: pre-wrap;"
                                rows="6">{{($user->comment)}}</textarea>
                            </div>
            
                            <button id="profile_button" type="button" class="btn bg-base text-white col col-md-3 mt-3">
                            <span class="spinner-border spinner-border-sm d-none" id="profile_spiner" ole="status"
                                aria-hidden="false"></span>
                            変更</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('organisms.output.list.index',['outputs' => $outputs , 'title' =>"アウトプット一覧"])
@endsection

@push('css')
<style type="text/css">
.mypage_image {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    background-position: center center;
}

.profile_img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  object-fit: cover;
}

.myprofile_img_box {
  position: relative;
}

.myprofile_img_button {
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  color: black;
  position: absolute;
  top: 55px;
  left: 42px;
}

.setting_img {
  position: relative;
  object-fit: cover;
}

.setting_img:before {
  content: '';
  position: absolute;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.5);
  /*半透明のフィルターをかける*/
}

.profile_comment{
  width: 420px;
}

</style>
@endpush

@push('javascript')
<script type="text/javascript">
/*
* プロフィール更新
*/
$('#profile_button').click(function (e) {
  
  var form = $('#profile_form').get(0);
  var formData = new FormData(form);
  formData.append('_method', 'POST');

  for (let d of formData.entries()) {
    console.log(`${d[0]}: ${d[1]}`);
  }
  $('#profile_name_error').empty();
  $('#profile_comment_error').empty();
  $('#profile_spiner').removeClass("d-none");

  $.ajax({
  type: "POST",
  url: "{{ route('mypage.update',$user->id)}}",
  dataType:"json",
  processData: false,
  contentType :false,
  headers:
  {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  data:formData})
  .done( (data) => {
    
    $('#profile_close').click();
    location.reload();
  })
  // Ajaxリクエストが失敗した時発動
  .fail( (jqXHR, textStatus, errorThrown) => {
      var arr = jqXHR.responseJSON.errors;
      $.each(arr, function(index, value)
      {
        if(index == "profile_name")
        {
          $('#profile_name_error').append(value);
        }

        if(index == "profile_comment")
        {
          $('#profile_comment_error').append(value);
        }
      });       
  })
  // Ajaxリクエストが成功・失敗どちらでも発動
  .always( (data) => {
    $('#profile_spiner').addClass("d-none");
  });
});

// プロフィール画像更新
$('#profile_img_button').on('change', function (e) {
  var reader = new FileReader();
  reader.onload = function (e) {
      $("#preview").attr('src', e.target.result);
  }
  reader.readAsDataURL(e.target.files[0]);
});
</script>
@endpush