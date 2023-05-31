@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Edit Category')}}<br></div>
                    <div class="card-body">
                        <a href="{{ route('category.index')}}" class="btn btn-info">All Category</a>
                        

                        <form action="{{route('category.update',$category->id)}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="mb-3">
                              <label for="category_name" class="form-label">Edit Category Name</label>
                              <input type="text" class="form-control" name="edit" id="edit"  value="{{$category->category_name}}" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Update</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection