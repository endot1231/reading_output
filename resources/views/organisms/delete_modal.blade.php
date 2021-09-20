<div class="modal fade" id="delete" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="label1">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">{{$title}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="delete_modal_close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{$body_message}}
        </div>
        
        <div class="modal-footer">
          <input type="hidden" name="id">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
          <button type="button" class="btn btn-primary" id="delete_button" >
            <span class="spinner-border spinner-border-sm d-none" id="delete_modal_spiner" ole="status"
            aria-hidden="false"></span>削除</button>
        </div>
      </div>
    </div>
</div>

@push('javascript')
<script type="text/javascript">

　// 値のセット
$('.delete_button').click(function (e) {
  var num = $(this).data('output_id');
  $('input[name="id"]').val(num);
});

/*
* データの削除
*/
$('#delete_button').click(function (e) {
  
  var id = $('input[name="id"]')[0].value
  $('#delete_modal_spiner').removeClass("d-none");

  var url ="{{ route('output.destroy',':id')}}";
  url = url.replace(":id",id);

  $.ajax({
  type: "DELETE",
  url: url,
  dataType:"json",
  headers:
  {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  data:null
  })
  .done( (data) => {
    $('#delete_modal_close').click();
    location.reload();
  })
  // Ajaxリクエストが失敗した時発動
  .fail( (jqXHR, textStatus, errorThrown) => {  
  })
  // Ajaxリクエストが成功・失敗どちらでも発動
  .always( (data) => {
    $('#delete_modal_spiner').addClass("d-none");
  });
});

</script>
@endpush