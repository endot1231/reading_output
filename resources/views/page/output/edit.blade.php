@extends('layouts.base')
@section('content')
@include('organisms.output.content.editor',['outputs' => $output,'content' => $content])
@endsection