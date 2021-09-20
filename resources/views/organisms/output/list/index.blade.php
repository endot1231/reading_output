<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2 ">
            <div class="row">
                @isset($title)
                <h5 class="col-12 font-weight-bold">{{$title}}</h5>
                @endisset
                @if(count($outputs) != 0)
                    @foreach($outputs as $output)
                        @include('molecules.output.card', ['output' => $output])
                    @endforeach
                    <div class="col-12 mt-5">
                        <div class="d-flex justify-content-center">
                            {{ $outputs->links() }}
                        </div>
                    </div>
                @endif
                @if(count($outputs) == 0)
                <p class="col-12">アウトプットはありません。</p>
                @endif  
            </div>
        </div>
    </div>
</div>

@include('modal.delete',['title'=>'投稿の削除','body_message'=>"投稿を削除しますか?"])
@push('css')
<style type="text/css">
    .output_card {
        cursor : pointer;
        transition:box-shadow 0.3s, transform 0.3s;
    }
    
    .output_card_image {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background-position: center center;
        cursor: pointer;
        transition-duration: 0.3s;
    }

    .output_card_hover_animation:hover {
        box-shadow:0 6px 14px rgba(0, 0, 0, 0.24);
        transform:translate(0, -2px);
    }
</style>
@endpush