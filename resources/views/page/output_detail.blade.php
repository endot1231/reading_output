@extends('layouts.base')

@section('content')
<div class="container mt-5 pt-5 border rounded">
    <div class="d-flex">
        <a href="#">
            <img class="output_card_image border" src="{{ url(\Storage::url("sample.png")) }}">
        </a> 
        <h5 class="ml-2">{{$output->user->name}}</h5>
    </div>
   
    <div class="row">
        <div class="col-12 text-break mt-5">
            <p class="font-weight-bold mb-0">書籍名</p> {{ $output->title }}
        </div>
        <div class="col-12 text-break mt-5">
            <p class="font-weight-bold mb-0">内容</p> {!! $output->content !!}
        </div>
    </div>
</div>
@endsection

@push('css')
<style type="text/css">
.output_card_image {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background-position: center center;
    cursor: pointer;
    transition-duration: 0.3s;
}
</style>
@endpush
