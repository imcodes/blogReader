@props(['label','type','placeholder','name','class'=>''])
<div class="form-group">
    <label for="exampleInputUsername1">{{$label}}</label>
    <input type="{{$type}}" name="{{$name}}" {{$attributes->merge(['class'=>'form-control '.$class])}} id="exampleInputUsername1" placeholder="{{$placeholder}}">
    {{$slot}}
  </div>