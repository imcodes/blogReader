@props(['classDefault'=>'btn btn-gradient-primary me-2',"type"=>'submit'])

<button type="{{$type}}" {{$attributes->merge(['class'=>' '.$classDefault])}}>{{$slot}}</button>
