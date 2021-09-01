@extends('layouts.base')

@section('content')
<div class="container mt-5">
    <div class="row border rounded">
        <div class="col-12">
            <div class="row">
                <h4 class="col-12">タイトル</h4>
                <p class="col-12 text-break">{{$output->title}}</p>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <h4 class="col-12">内容</h4>
                <p class="col-12 text-break">{{$output->content}}</p>
            </div>
        </div>
    </div>
</div>
@endsection
