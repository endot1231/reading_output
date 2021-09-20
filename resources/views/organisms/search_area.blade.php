<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-9 col-md-6 offset-md-2">
            <p>検索条件</p>
        </div>
        <input id="keyword" type="text" name="keyword" class="form-control col-9 col-md-6 offset-md-2" value="{{ Session::get('keyword') }}" required autocomplete="text" placeholder="書籍名を入力" autofocus>
        <button type="submit" class="btn bg-base text-white col-3 col-md-2 serach_button">検索</button>
    </div>
</div>

@push('javascript')
<script type="text/javascript">
    // card click event
    $('.serach_button').on('click',function (e) {
        var keyword =  $('#keyword').val();
        if (keyword === undefined || keyword === "") {
            return;
        }
        var url = '{{$url}}'+ "?keyword=" + keyword;
        location.href = url;
    });
</script>
@endpush