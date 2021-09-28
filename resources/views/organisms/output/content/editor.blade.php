<div class="container mt-5 pt-5">
  <div class="row">
    @if($mode != "edit")
      @auth
        @if($output->user->id == Auth::id())
        <div class="text-right col-12">
          <a href="{{route("output.edit",$output->id)}}"><i class="far fa-edit"></i>編集</a>
        </div>
        @endif
      @endauth
    @endif
    <div class="form-group col-12">
      <label for="title">書籍名</label>
      <input type="text" class="form-control" id="title" placeholder="書籍名を入力して下さい。" value="{{$output->title}}">
    </div>
    <div class="col-12 h-100"> 
      <div id="editor-container" style="min-height: 450px;"></div>
    </div>
    @if($mode == "edit")
    @auth
        @if($output->user->id == Auth::id())
        <div class="col-12 text-center mt-2 mb-5">
          <button id="content_button" type="button" class="btn bg-base text-white" style="width: 140px">
            <span class="spinner-border spinner-border-sm d-none" id="content_spiner" ole="status"
                aria-hidden="false"></span>
            変更</button>
        </div>
        @endif
      @endauth
    @endif
  </div>
</div>

@push('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('javascript')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://unpkg.com/quill-table-ui@1.0.5/dist/umd/index.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
var toolbar = null;
var isEdit = false;

if(@json($mode) == "edit"){
  var toolbar = [
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        ['bold', 'italic', 'underline', 'strike'],
        ['code-block',{ 'color': [] }, { 'background': [] }], 
        [{ 'align': [] }],
        [{ list: 'ordered' }, { list: 'bullet' }]
      ];
  var isEdit =true;
}

var quill = new Quill('#editor-container', {
  modules: {
    toolbar: toolbar
  },
  placeholder: '',
  theme: 'snow'
});

// set content
quill.root.innerHTML =  '{!! sanitizeHtml($output->content) !!}';

if(!isEdit){
  quill.disable();
}

async function updateContent(){
$('#content_spiner').removeClass("d-none");
$('#content_button').prop('disabled', true);
 $.ajax({
    type: "PUT",
    url: "/output/{{ $output->id }}",
    dataType:"json",
    headers:
    {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data:{'title': $("#title").val(),'content': quill.root.innerHTML}
    }).done( (data) => {
      toastr.success('編集した内容を保存しました。');
    })
    // Ajaxリクエストが失敗した時発動
    .fail( (jqXHR, textStatus, errorThrown) => {
      toastr.warning('編集した内容を保存できませんでした。'); 
    })
    // Ajaxリクエストが成功・失敗どちらでも発動
    .always( (data) => {
      $('#content_spiner').addClass("d-none");
      $('#content_button').prop('disabled', false);
  });
}

/*
quill.on('text-change', function(delta, oldDelta, source) {
  updateContent();
});

$('#title').keyup(function (e) {
  updateContent();
})
*/

$('#content_button').click(function (e) {
  updateContent();
});

</script>
@endpush
