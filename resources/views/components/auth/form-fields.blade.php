@props(['label','Type','placeholder','name'])
<div class="form-group">
    <label for="exampleInputUsername1">{{$label}}</label>
    <input type="{{$type}}" name="{{$name}}" class="form-control" id="exampleInputUsername1" placeholder="{{$placeholder}}">
  </div>