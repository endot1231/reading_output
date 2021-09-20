
<div class="col-12 d-flex flex-row bd-highlight border rounded output_card output_card_hover_animation pb-3 pt-3" id="{{$output->id}}" >
    <a href="{{route('mypage.show',$output->user->id)}}">
        <img class="output_card_image border" src="{{$output->user->profile->url}}">
    </a>
    <div class="row col-12">
        <a href="{{route('output.show',$output->id)}}" class="row col-11 ml-2 text-decoration-none text-dark">
            <div class="col-12">
                <h5>{{$output->user->name}}</h5>
            </div>
            <div class="col-12">
                書籍名 : {{Str::limit($output->title, 30, '...') }}
            </div>
        </a>
        <div class="row col-12 d-flex justify-content-end">
            @if($output->user->id == Auth::id())
                @if(!Route::is('history') )
                    <button type="button" class="btn btn-light delete_button" data-output_id="{{$output->id}}" data-toggle="modal" data-target="#delete">
                        <i class="far fa-trash-alt"></i>
                    </button>
                @endif
            @endif
        </div>
    </div>
</div>



