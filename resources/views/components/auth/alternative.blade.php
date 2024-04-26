@props(['auth'])
@if($auth == 'login')
    <p><a href="{{route('login')}}">Already have an account</a></p>
@else
<p> <a href="{{route('signup')}}">Signup if you don't have an account </a> </p>
@endif