<div class="container mt-5 pt-5">
  <div class="row">
    <div class="form-group col-12">
      <label for="title">書籍名</label>
      <input type="text" class="form-control" id="title" placeholder="書籍名を入力して下さい。" value="{{$output->title}}">
    </div>
    <div class="col-12"> 
      <div id="editor-container"></div>
    </div>
  </div>
</div>

@push('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://unpkg.com/quill-table-ui@1.0.5/dist/umd/index.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
/*
var show_toast = true;
var enableFlag = function(){
  show_toast = true;
};
setInterval(enableFlag, 5000);
*/

var quill = new Quill('#editor-container', {
  modules: {
    toolbar: [
      [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
      ['bold', 'italic', 'underline', 'strike'],
      ['code-block',{ 'color': [] }, { 'background': [] }], 
      [{ 'align': [] }],
      [{ list: 'ordered' }, { list: 'bullet' }]
    ]
  },
  placeholder: '',
  theme: 'snow'
});

// set content
quill.root.innerHTML =  '{!! $content !!}';

function updateContent(){
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
      /*
      if(show_toast){
        toastr.success('編集した内容を保存しました。');
      }
      */
    })
    // Ajaxリクエストが失敗した時発動
    .fail( (jqXHR, textStatus, errorThrown) => {
      toastr.warning('編集した内容を保存できませんでした。'); 
    })
    // Ajaxリクエストが成功・失敗どちらでも発動
    .always( (data) => {
  });
}

quill.on('text-change', function(delta, oldDelta, source) {
  updateContent();
});

$('#title').keyup(function (e) {
  updateContent();
})
</script>
@endpush
