@extends('backend.layouts.app')

@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Category</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="cat_name">Category Name</label>
                            <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Name" value="{{ old('cat_name') }}">
                            @error('cat_name')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cat_url">Category URL</label>
                            <input type="text" id="cat_url" class="form-control" name="cat_url" placeholder="URL" value="{{ old('cat_name') }}">
                            @error('cat_url')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manage Categories</h4>
                    </div>
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>URL</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($categories->allCategories) > 0)
                                        @foreach ($categories->allCategories as $cat)
                                            <tr>
                                                <td class="text-bold-500">{{ $cat->id }}</td>
                                                <td class="text-bold-500">{{ $cat->cat_name }}</td>
                                                <td>{{ $cat->cat_url }}</td>
                                                <td>
                                                    <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="Update">
                                                        <i class="bi bi-pencil" aria-hidden="true"></i>
                                                    </a>
                                                    {{-- <button type="button" class="btn btn-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-category-form-{{ $cat->id }}').submit()"><i class="bi bi-trash"></i></button> --}}

                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#animation-{{ $cat->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>

                                                    {{-- Category delet modal --}}
                                                    <div class="modal text-left" id="animation-{{ $cat->id }}" tabindex="-1" aria-labelledby="myModalLabel6" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Are you sure delete this category???
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Close</span>
                                                                    </button>
                                                                    <button 
                                                                        type="button" 
                                                                        data-bs-dismiss="modal" class="d-none d-sm-block btn btn-danger" 
                                                                        onclick="event.preventDefault(); document.getElementById('delete-category-form-{{ $cat->id }}').submit()">
                                                                        Delete
                                                                    </button>
                                                                    <form id="delete-category-form-{{ $cat->id }}" style="display: none;" action="{{ route('categories.destroy',$cat->id) }}" method="post">
                                                                        @csrf 
                                                                        @method('DELETE')
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>{{-- End category delet modal --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
@endsection