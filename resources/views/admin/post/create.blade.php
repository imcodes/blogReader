@extends("layout.admin")
@section('page-title',$pageTitle)
@section('main')
        <div class="card">
            <div class="card-body">
                <x-form.form :action="route('createPost')">
                    <x-form.input label="Title"  type="text" name="title" placeholder="your blog title" required/>
                    <x-form.input type="text" placeholder="the body of your blog" name="blogBody" label="body" required/>
                    <x-form.input type="file" placeholder="the body of your blog" name="featured_image" label="your featured image" required/>
                    <x-form.input type="file" placeholder="media files" name="media_files" label="other media files(optional)"/>
                    <div class="form-group">
                      <label for="category">category</label>
                      <select class="form-control" name="category" id="category">
                        @foreach ($category as $item)
                        <option>{{$item->category_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <x-form.button>Create</x-form.button>
                    </x-form.form>
            </div>
        </div>
@stop
