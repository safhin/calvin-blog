@extends('backend.layouts.app')

@section('content')
    <section class="section">
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Manage Posts</h4>
                    </div>
                    <div class="card-content">
                        <!-- table bordered -->
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TITLE</th>
                                        <th>DESCRPTION</th>
                                        <th>TAG</th>
                                        <th>CATEGORY</th>
                                        <th>IMAGE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (true)
                                        @foreach ($posts->allPosts as $post)
                                            <tr>
                                                <td class="text-bold-500">{{ $post->id }}</td>
                                                <td width="200px" class="text-bold-500">{{ $post->title }}</td>
                                                <td width="300px">{!! Str::words($post->description, 10, '...') !!}</td>
                                                <td width="200px" class="text-bold-500">
                                                    @foreach ($post->tags as $tag)
                                                        {{ $tag->tag_name }}@if (!$loop->last),@endif
                                                    @endforeach
                                                </td>
                                                <td widith="100px" class="text-bold-500">{{ $post->category->cat_name }}</td>
                                                <td><img class="post_img" src="{{ asset($post->image) }}" alt=""></td>
                                                <td widith="50px"> 
                                                    <a href="{{ route('posts.edit', $post->id) }}" class="action-btn btn btn-primary btn-sm d-inline-flex" data-toggle="tooltip" data-placement="left" title="" data-original-title="Update">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <button type="button" class="action-btn btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#animation-{{ $post->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                    <!-- disabled animation Modal -->
                                                    <div class="modal text-left" id="animation-{{ $post->id }}" tabindex="-1" aria-labelledby="myModalLabel6" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <p>
                                                                        Are you sure delete this post???
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
                                                                        onclick="event.preventDefault(); document.getElementById('delete-category-form-{{ $post->id }}').submit()">
                                                                        Delete
                                                                    </button>
                                                                    <form id="delete-category-form-{{ $post->id }}" style="display: none;" action="{{ route('posts.destroy',$post->id) }}" method="post">
                                                                        @csrf 
                                                                        @method('DELETE')
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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