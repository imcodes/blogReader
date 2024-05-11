@extends("layout.admin")
@section('page-title',$pageTitle)
@section('main')
        <x-form.form :action="route('createPost')">
        <x-form.input label="Title"  type="text" name="title" placeholder="your blog title" required/>
        <x-form.input type="text" placeholder="the body of your blog" name="blogBody" label="body" required/>
        <x-form.input type="file" placeholder="the body of your blog" name="featured_image" label="your featured image" required/>
        <x-form.input type="file" placeholder="media files" name="media_files" label="other media files(optional)"/>
        <x-form.button>Create</x-form.button>
        </x-form.form>
@stop
