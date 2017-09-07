@extends('honeycombs::layouts.admin')
@section('content')
    @foreach($items as $item)
        <a href="{{URL::to("honeycombs/$category/edit/$item->id")}}">{{$item->$representative_column}}</a>
        <br><br>
    @endforeach
@endsection
