@extends('honeycombs::layouts.admin')
@section('content')
<form action="{{URL::to("/honeycombs/$category/edit/$id")}}" method="post">
    {{ csrf_field() }}
    @foreach($configs[$category]["columns"] as $key => $value)
        <label>{{$key}}</label><input name="{{$key}}" value="{{$item->$key}}">
    @endforeach
    @if($relations)
    <label>{{$configs[$category]["relations"]["input_label"]}}</label>
    <?php $foreign_key = $configs[$category]["relations"]["foreign_key"]; ?>
    <select name="{{$configs[$category]["relations"]["foreign_key"]}}">
        @foreach($relations as $relation)
        <option
            @if($item->$foreign_key == $relation->id)
                selected
            @endif
        value="{{$relation->id}}">{{$relation->$relation_representative_column}}</option>
        @endforeach
    </select>
    @endif
    <input type="submit" data-id="">
</form>
@endsection
