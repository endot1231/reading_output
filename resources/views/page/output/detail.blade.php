@extends('layouts.base')

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-between">
        <a href="{{route("mypage.show",$output->user->id)}}" class="text-center ml-auto mr-auto">
            <img class="mb-3 mypage_image border mx-auto img-fluid" src="{{ $output->user->profile->url }}" />
        </a>
    </div>
    
    <div class="row">
        <div class="col pt-2 text-center">
            <h5 class="font-weight-bold">{{$output->user->name}}</h5>
        </div>
    </div>
</div>

@include('organisms.output.content.editor',['outputs' => $output,'mode'=>"show"])

@endsection

@push('css')
<style type="text/css">
.mypage_image {
    width: 140px;
    height: 140px;
    border-radius: 50%;
    background-position: center center;
}
</style>
@endpush
