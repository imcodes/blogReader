@extends('layout.auth-layout')
@section('form')
    @push('auth-title')
    Sign-up
    @endpush
      <x-auth.form-fields label="username" Type="text" placeholder="username" name="username"/>
      <x-auth.form-fields label="email" Type="email" placeholder="your email e.g example@gmail.com" name="email"/>
      <x-auth.form-fields label="password" Type="password" placeholder="password" name="password"/>
      <x-auth.form-fields label="password confirm" Type="password" placeholder="confifm password" name=""/>
      <x-auth.remember/>
      <x-auth.alternative auth='login'/>
      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
@stop