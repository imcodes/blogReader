@props(['type','name','label'=>'','placeholder'=>'','class'=>''])
<div class="form-group">
    <label for="exampleInputUsername1">{{$label}}</label>
    <input type="{{$type}}" name="{{$name}}" {{$attributes->merge(['class'=>'form-control '.$class])}} id="exampleInputUsername1" placeholder="{{$placeholder}}"  {{$attributes->except(['placeholder','name','id','class','type'])}}>
    {{$slot}}
  </div>