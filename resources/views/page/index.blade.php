@extends('layouts.base')

@section('content')
@include('organisms.search_area',['url'=>route('index')])
@include('organisms.output.list.index',['outputs' => $outputs,'title'=>"アウトプット一覧"])
@endsection

