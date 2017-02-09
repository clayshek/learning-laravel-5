@extends('layouts.layout')

@section ('content')

        WIDGETS: <br />
        
        <div class="col-sm-8 blog-main">

        @foreach ($widgets as $widget)
         <li>ID: {{ $widget->id }}, NAME: {{ $widget->name }}, DESC: {{ $widget->details }} </li>
         @endforeach

        </div>

@endsection