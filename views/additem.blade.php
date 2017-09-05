@extends('honeycombs::layouts.admin')
@section('content')
    <form action="{{URL::to("/honeycombs/$category/additem")}}" method="post">
        {{ csrf_field() }}
        @foreach($configs[$category]["columns"] as $column => $props)
        <label>{{$props["human_readable_name"]}}</label><input name="{{$column}}">
        @endforeach
        @if($relations)
        <label>{{$configs[$category]["relations"]["input_label"]}}</label>
        <select name="{{$configs[$category]["relations"]["foreign_key"]}}">
            @foreach($relations as $relation)
            <option value="{{$relation->id}}">{{$relation->$relation_representative_column}}</option>
            @endforeach
        </select>
        @endif
        <input type="submit" data-id="">
    </form>
@endsection

<script>

    function addItem() {
        $.ajax({
            url: "{{URL::to('/additem')}}",
            data: formData,
            type: "POST"
        });
    }
</script>
