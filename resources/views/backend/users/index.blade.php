@extends('backend.layouts.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Users</div>

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Posts</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->admin ? 'Admin' : 'User' }}</td>
                                    <td>{{ $user->posts->count() }}</td>
                                    <td>
                                        @if (auth()->user()->id === $user->id)
                                            <a href="{{ route('posts.edit', $user->id) }}" class="action-btn btn btn-primary btn-sm d-inline-flex" data-toggle="tooltip" data-placement="left" title="" data-original-title="Update">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                        @endif
                                        @if (auth()->user()->admin)
                                            <button type="button" class="action-btn btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#animation-{{ $user->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <!-- disabled animation Modal -->
                                            <div class="modal text-left" id="animation-{{ $user->id }}" tabindex="-1" aria-labelledby="myModalLabel6" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <p>
                                                                Are you sure delete <span class="fw-bolder">{{ $user->name }}</span>???
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
                                                                onclick="event.preventDefault(); document.getElementById('delete-category-form-{{ $user->id }}').submit()">
                                                                Delete
                                                            </button>
                                                            <form id="delete-category-form-{{ $user->id }}" style="display: none;" action="{{ route('user.destroy',$user->id) }}" method="post">
                                                                @csrf 
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection