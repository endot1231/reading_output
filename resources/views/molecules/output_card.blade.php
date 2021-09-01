
<div class="row border mt-2 rounded output_card output_card_hover_animation" id="{{$output->id}}" >
    <a class="col-2" href="#">
        <a>画像</a>
    </a>     
    
    <div class="col-12 col-sm-10 text-break">
        書籍名 : {{Str::limit($output->title, 30, '...') }}
    </div>

    <div class="col-12 text-break">
        内容 : {{Str::limit($output->content, 200, '...') }}
    </div>
</div>



