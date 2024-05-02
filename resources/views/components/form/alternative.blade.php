@props(['auth'])
@if($auth == 'login')
    <p><a href="{{route('sign-in')}}">Already have an account</a></p>
@else
<p> <a href="{{route('sign-up')}}">Signup if you don't have an account </a> </p>
@endif
