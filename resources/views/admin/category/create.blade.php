@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Add New Category')}}<br></div>
                    <div class="card-body">
                        <a href="{{ route('category.index')}}" class="btn btn-info">All Category</a>
                        

                        <form action="{{route('category.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                              <label for="category_name" class="form-label">Category Name</label>
                              <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" id="category_name" aria-describedby="emailHelp" placeholder="Category Name" value="{{old('category_name')}}" required>
                              @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection