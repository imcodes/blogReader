@extends('layout.auth')
@section('form')
    @push('auth-title')
    Login
    @endpush
    @if (session('error'))
    <span style="color:#ff0000">{{session('error')}}</span>
    @endif
      <x-form.form :action="route('validate-sign-in')" class="ml-20">
        <x-form.input  label="Email" type="email" placeholder="your email e.g example@gmail.com" name="email"/>
        <x-form.input label="Password" type="password" placeholder="password" name="password" />
        <x-form.remember/>
        <x-form.alternative auth="signup"/>
        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
      </x-form.form>
@stop
