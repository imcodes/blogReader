@props(['type','name','label'=>'','placeholder'=>'','class'=>'','id'=>'id','value'=>''])
<div class="form-group">
    <label for="exampleInputUsername1">{{$label}}</label>
    <input type="{{$type}}" name="{{$name}}" value="{{$value}}" {{$attributes->merge(['class'=>'form-control '.$class])}} id="{{$id}}" placeholder="{{$placeholder}}"  {{$attributes->except(['placeholder','name','id','class','type'])}}>
    {{$slot}}
  </div>
