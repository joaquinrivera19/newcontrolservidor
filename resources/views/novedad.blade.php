@extends('layouts.app')

@section('content')


    @foreach($novedad as $nove)

        {{ $nove->conces->con_nombre }}

    @endforeach



@endsection