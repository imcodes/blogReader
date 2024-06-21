@extends('layout.admin')
@section('page-title','Category dashboard')
@section('main')
    {{-- <div class="row d-flex">

        <div href="" class="decoration-none col-md-4 c-p">
        <div class=" stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="{{asset('admin/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Search<i class="mdi mdi-magnify mdi-24px float-right"></i>
                </h4>
                <h6>
                    Search for a category
                </h6>
            </div>
            </div>
        </div>
    </div>
    </div> --}}
    <div class="d-flex row justify-content-between p-2">

        <x-form.form :action="route('admin.blog.category.new_category')" class="col-md-6 my-3 ">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create a new category</h4>
                    <x-form.input label="Category name" type="text" placeholder="food, fashion ...." name="category_name" value="{{old('name')}}">
                        @error('name')
                        <span style="color: red">{{$errors->first('name')}}</span>
                        @enderror
                    </x-form.input>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Description</label>
                        <textarea class="form-control" id="exampleFormControlSelect2" name="description">
                        </textarea>
                    </div>
            <button class="btn btn-primary">Create</button>
        </div>
    </div>
</x-form.form>
<div class="card col-md-6 my-2 overflow-scroll">
    <div class="card-body">
        <table class="table">
            <thead>
                <th scope="col" colspan="3">All categories</th>
              <th></th>
            </thead>
            <tbody>
                @foreach ($Data as $item)
                <tr>
                  <td>{{ucwords($item->category_name)}}</td>
                  <td>
                      {{substr($item->description,0,15)}}...
                  </td>
                  <td>
                    @if (count($item->blog) != 0)
                    {{count($item->blog)}} blogs.
                    @else
                    No blog yet
                    @endif
                </td>
                <td><button class="btn btn-link text-danger p-2" data-bs-target="#modal" data-bs-toggle="modal" onclick="setdel({{$item->id}})" title="Delete User" type="submit"><i class='mdi mdi-delete'></i></button>                </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <span class="card-footer">{{$Data->links()}}</span>
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="formbody">

             </div>
        </div>
    </div>
</div>
@push('scripts')
      <script>
        let setdel = (id) =>{
            document.querySelector('.formbody').innerHTML =
            `<form action='/admin-panel/blog/category/delete/${id}' method="POST">
                <div class="modal-body">
             @method('DELETE')
             @csrf
     </div>
     <div class="modal-footer">
        <button class="btn btn-link text-danger p-2" title="Delete User" type="submit"><i class='mdi mdi-delete'></i></button>
    </div>
 </form>
    `
        }
    </script>
@endpush
{{-- <span class="num">1</span>
<div class="d-flex w-80 h-50 mx-4 row">
    <span  class="col-8">
        <div class="row p-1 bb-solid w-75 mx-5">
            <h2 class="col-4">Category</>
                <h2 class="col-6">All blogs</>
                </div>
                <div class="h-100 mx-5  my-2   p-1 overflow-hidden">
                    <div class=" w-45-w h-100 d-flex box">
                        <div class=" row col-12 w-100 mx-4">
                           <b class="br-solid col-2 p-4">Food</b>
                            <div class="col-6 p-4  bb-solid tainer">
                                <p>#author <b>jaquin</b></p>
                                how to make lazanya
                            lorem ispum renum niew viet udse
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quam pariatur, eum iure natus iusto consequuntur saepe rem aliquid? Debitis alias molestiae natus cupiditate fugiat? Magni voluptas repudiandae praesentium distinctio.</p>
                            </div>
                        </div>
                        <div class=" row col-12 w-100 mx-4">
                           <b class="br-solid col-2 p-4">Food</b>
                            <div class="col-6 p-4  bb-solid tainer">
                                <p>#author <b>pagon</b></p>
                                how to make lazanya
                            lorem ispum renum niew viet udse
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quam pariatur, eum iure natus iusto consequuntur saepe rem aliquid? Debitis alias molestiae natus cupiditate fugiat? Magni voluptas repudiandae praesentium distinctio.</p>
                            </div>
                        </div>
                        <div class=" row col-12 w-100 mx-4">
                           <b class="br-solid col-2 p-4">Food</b>
                            <div class="col-6 p-4  bb-solid tainer">
                                <p>#author <b>pagon1</b></p>
                                how to make lazanya
                            lorem ispum renum niew viet udse
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quam pariatur, eum iure natus iusto consequuntur saepe rem aliquid? Debitis alias molestiae natus cupiditate fugiat? Magni voluptas repudiandae praesentium distinctio.</p>
                            </div>
                        </div>
                        <div class=" row col-12 w-100 mx-4">
                           <b class="br-solid col-2 p-4">Food</b>
                            <div class="col-6 p-4  bb-solid tainer">
                                <p>#author <b>pagon2</b></p>
                                how to make lazanya
                            lorem ispum renum niew viet udse
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quam pariatur, eum iure natus iusto consequuntur saepe rem aliquid? Debitis alias molestiae natus cupiditate fugiat? Magni voluptas repudiandae praesentium distinctio.</p>
                            </div>
                        </div>
                        <div class=" row col-12 w-100 mx-4">
                           <b class="br-solid col-2 p-4">Food</b>
                            <div class="col-6 p-4  bb-solid tainer">
                                <p>#author <b>pagon3</b></p>
                                how to make lazanya
                            lorem ispum renum niew viet udse
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quam pariatur, eum iure natus iusto consequuntur saepe rem aliquid? Debitis alias molestiae natus cupiditate fugiat? Magni voluptas repudiandae praesentium distinctio.</p>
                            </div>
                        </div>
                        <div class=" row col-12 w-100 mx-4">
                           <b class="br-solid col-2 p-4">Food</b>
                            <div class="col-6 p-4  bb-solid tainer">
                                <p>#author <b>pagon4</b></p>
                                how to make lazanya
                            lorem ispum renum niew viet udse
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quam pariatur, eum iure natus iusto consequuntur saepe rem aliquid? Debitis alias molestiae natus cupiditate fugiat? Magni voluptas repudiandae praesentium distinctio.</p>
                            </div>
                        </div>
                    </div>
                   </div>
                </span>
                <span class="col-4 arrow">&rarr;</span>
        </div>
        @push('scripts')
                <script>
                    let i = 1
                    let metric = 47
                    let increment = 0.5
                    let slider = document.querySelector('.box')
                    document.querySelector('.arrow').onclick = () => {
                        // let increment = increment + 0.5
                        increment++
                        let sum = (metric * i ) + (increment - 0.4)
                        slider.style.transform = `translateX(-${sum}vw)`;
                        i++;
                        document.querySelector('.num').innerHTML = i
                    }
                </script>
        @endpush --}}
@stop
