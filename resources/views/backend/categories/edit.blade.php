@extends('backend.layouts.app')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Category</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ route('categories.update',$category->categoryById->id ) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="cat_name">Category Name</label>
                                <input type="text" class="form-control" id="cat_name" name="cat_name" value="{{ $category->categoryById->cat_name }}">
                                @error('cat_name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cat_url">Category URL</label>
                                <input type="text" id="cat_url" class="form-control" name="cat_url" placeholder="URL" value="{{ $category->categoryById->cat_url }}">
                                @error('cat_url')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection