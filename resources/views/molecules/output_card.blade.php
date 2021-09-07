
<div class="col-12 col-md-10 d-flex flex-row bd-highlight border rounded output_card output_card_hover_animation pb-3 pt-3" id="{{$output->id}}" >
    <a href="#">
        <img class="output_card_image border" src="{{ url(\Storage::url("sample.png")) }}">
    </a> 
    <div class="row col-11 ml-2">
        <div class="col-12 col-md-10">
            <h5>{{$output->user->name}}</h5>
        </div>
        <div class="col-12 col-md-10 text-break">
            書籍名 : {{Str::limit($output->title, 30, '...') }}
        </div>
        <div class="col-12 text-break">
            内容 : {{Str::limit($output->content, 200, '...') }}
        </div>
    </div>
</div>



