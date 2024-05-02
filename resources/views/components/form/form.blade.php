@props([
    'class' => '',
    'method' => 'POST',
    'action' => '',
    'enctype' => 'multipart/form-data',
])

<form method="{{$method}}" action="{{$action}}"   enctype="{{$enctype}}" {{$attributes->merge(['class'=>$class])}}>
    @csrf
    {{$slot}}
</form>