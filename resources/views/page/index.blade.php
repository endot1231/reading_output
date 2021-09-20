@extends('layouts.base')

@section('content')
@include('organisms.search_area',['url'=>route('index')])
@include('organisms.list_output_card',['outputs' => $outputs,'title'=>"アウトプット一覧"])
@endsection

