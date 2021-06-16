@extends('backend.layouts.app')
@section('extra-style')
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/choices.js/choices.min.css') }}">
    <script src="https://cdn.tiny.cloud/1/bs657cumm89e2s37wgjymgcmxlm31sq2hpkjt8xiidflx4ha/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea',
            height: 200,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
    </script>
@endsection
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Post</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title') }}">
                                @error('title')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image" placeholder="Image">
                                @error('image')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    <select class="form-select" id="inputGroupSelect01" name="category_id">
                                        <option selected="">Categories...</option>
                                        @if (count($categoryModel->allCategories) > 0)
                                            @foreach ($categoryModel->allCategories as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                @error('category_id')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tag">Tags</label>
                                {{-- <div class="mb-3 form-control">
                                    <select class="choices form-select multiple-remove" multiple="multiple" id="inputGroupSelect01" name="tags[]" style="z-index: 1111">
                                        @if (count($postModel->getTags()) > 0)
                                            @foreach ($postModel->getTags() as $tag)
                                                <option class="js-example-tags" value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div> --}}
                                <select class="form-control tag" multiple="multiple" name="tags[]">
                                    @foreach ($tagModel->allTags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                    @endforeach
                                </select>
                                @error('tag_id')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cat_url">Description</label>
                                <textarea name="description" id="description" name="description" cols="30" rows="10"></textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-check mt-3 mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input form-check-info" name="sticky" id="sticky">
                                    <label class="form-check-label" for="sticky">Check For Sticky</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Create Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extra-script')
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/choices.js/choices.min.js') }}"></script>
@endsection