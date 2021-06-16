@extends('backend.layouts.app')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update tag</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ route('tags.update',$tag->id ) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="tag_name">tag Name</label>
                                <input type="text" class="form-control" id="tag_name" name="tag_name" value="{{ $tag->tag_name }}">
                                @error('tag_name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tag_url">tag URL</label>
                                <input type="text" id="tag_url" class="form-control" name="tag_url" placeholder="URL" value="{{ $tag->tag_url }}">
                                @error('tag_url')
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