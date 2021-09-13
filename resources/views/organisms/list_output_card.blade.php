<div class="container mt-5 pt-5">
    <div class="row">
        @isset($title)
            <h6 class="col-12 font-weight-bold">{{$title}}</h6>
        @endisset
        @foreach($outputs as $output)
            @include('molecules.output_card', ['output' => $output])
        @endforeach
        <div class="row">
            <div class="offset-4">
                {{ $outputs->links() }}
            </div>
        </div>
    </div>
</div>

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

@push('javascript')
<script type="text/javascript">
// card click event
$('.output_card').on('click',function (e) {
    var id =  $(this).attr("id");
    if (id === undefined) {
        return;
    }

    // get baseUrl then create url of detail of output.
    var getUrl = window.location;
    var url =  getUrl.origin +"/output/"+id;
    location.href = url;
});
</script>
@endpush

