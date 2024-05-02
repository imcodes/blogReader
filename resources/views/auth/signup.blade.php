@extends('layout.auth')
@section('form')
    @push('auth-title')
    Sign-up
    @endpush
    @php $act=route('validate-sign-up'); @endphp
      <x-form.form :action="route('validate-sign-up')">
        <x-form.input label="username" type="text" placeholder="username" name="name" value="{{old('username')}}">
            @error('name')
                <span style="color: red">{{$errors->first('name')}}</span>
            @enderror
        </x-form.input>
        <x-form.input label="email" type="email" placeholder="your email e.g example@gmail.com" name="email">
            @error('email')
                <span style="color: red">{{$errors->first('email')}}</span>
            @enderror
      </x-form.form>
        <x-form.input label="password"  type="password" placeholder="password" name="password">
            @error('password')
            <span style="color: red">{{$errors->first('password')}}</span>
            @enderror
        </x-form.input>
        
        <x-form.input label="password confirm" type="password" placeholder="confifm password" name="confirm_password">
            @error('confirm_password')
            <span style="color: red">{{$errors->first('confirm_password')}}</span>
            @enderror 
        </x-form.input>
        <x-form.remember/>
        <x-form.alternative auth="login"/>
        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
      </x-form.form>
@stop
