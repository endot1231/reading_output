@extends('layouts.base')

@section('content')
@include('organisms.search_area',['url'=>route('history')])
@include('organisms.output.list.history',['histories' => $histories,'title'=>"閲覧履歴"])
@endsection

