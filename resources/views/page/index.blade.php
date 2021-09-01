@extends('layouts.base')

@section('content')
@include('organisms.list_output_card',['outputs' => $outputs])
@endsection

