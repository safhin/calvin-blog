@extends('frontend.layouts.app')

@section('content')
    <section class="s-content">

        <div class="row">
            <div class="column large-12">

                <article class="s-content__entry format-standard">

                    <div class="s-content__media">
                        <div class="s-content__post-thumb">
                            <img src="{{ $post->singlePost->image }}" sizes="(max-width: 2100px) 100vw, 2100px" alt="">
                        </div>
                    </div> <!-- end s-content__media -->

                    <div class="s-content__entry-header">
                        <h1 class="s-content__title s-content__title--post">{{ $post->singlePost->title }}</h1>
                    </div> <!-- end s-content__entry-header -->

                    <div class="s-content__primary">

                        <div class="s-content__entry-content">

                            <p class="lead">{!! $post->singlePost->description !!}</p> 


                        </div> <!-- end s-entry__entry-content -->

                        <div class="s-content__entry-meta">

                            <div class="entry-author meta-blk">
                                @if ($post->singlePost->user->user_image)
                                    <div class="author-avatar">
                                        <img class="avatar" src="images/avatars/user-06.jpg" alt="">
                                    </div>
                                @endif
                                <div class="byline">
                                    <span class="bytext">Posted By</span>
                                    <a href="#0">{{ $post->singlePost->user->name }}</a>
                                </div>
                            </div>

                            <div class="meta-bottom">
                                
                                <div class="entry-cat-links meta-blk">
                                    <div class="cat-links">
                                        <span>In</span> 
                                        <a href="#0">{{ $post->singlePost->category->cat_name }}</a>
                                    </div>

                                    <span>On</span>
                                    {{ \Carbon\Carbon::parse($post->singlePost->form_date)->format('F j, Y') }}
                                </div>

                                <div class="entry-tags meta-blk">
                                    <span class="tagtext">Tags</span>
                                    <a href="#">
                                        @foreach ($post->singlePost->tags as $tag)
                                            {{ $tag->tag_name }}@if (!$loop->last),@endif
                                        @endforeach
                                    </a>
                                </div>

                            </div>

                        </div> <!-- s-content__entry-meta -->

                        
                        <div class="s-content__pagenav">
                            @isset($nextAndPerviousPostmodel->previousPost)
                                <div class="prev-nav">
                                    <a href="{{ route('post', $nextAndPerviousPostmodel->previousPost->slug) }}" rel="prev">
                                        <span>Previous</span>
                                        {{ $nextAndPerviousPostmodel->previousPost->title }}
                                    </a>
                                </div>
                            @endisset
                            @isset($nextAndPerviousPostmodel->nextPost)
                                <div class="next-nav">
                                    <a href="{{ route('post', $nextAndPerviousPostmodel->nextPost->slug) }}" rel="next">
                                        <span>Next</span>
                                        {{ $nextAndPerviousPostmodel->nextPost->title }}
                                    </a>
                                </div>
                            @endisset
                        </div> <!-- end s-content__pagenav -->

                    </div> <!-- end s-content__primary -->
                </article> <!-- end entry -->

            </div> <!-- end column -->
        </div> <!-- end row -->


        <!-- comments
        ================================================== -->
        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="column large-12">

                    <h3>@php echo count($post->singlePost->comments) @endphp Comments</h3>

                    <!-- START commentlist -->
                    <ol class="commentlist">

                        @foreach ($post->singlePost->comments as $comment)
                            
                            <li class="depth-1 comment">
{{-- 
                                <div class="comment__avatar">
                                    <img class="avatar" src="images/avatars/user-01.jpg" alt="" width="50" height="50">
                                </div> --}}

                                <div class="comment__content">

                                    <div class="comment__info">
                                        <div class="comment__author">{{ $comment->name }}</div>

                                        <div class="comment__meta">
                                            <div class="comment__time">{{ \Carbon\Carbon::parse($post->singlePost->form_date)->format('d/m/Y') }}</div>
                                            <div class="comment__reply">
                                                <a class="comment-reply-link" href="#0">Reply</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="comment__text">
                                    <p>{{ $comment->comment_body }}</p>
                                    </div>

                                </div>

                            </li> <!-- end comment level 1 -->
                        @endforeach

                    </ol>
                    <!-- END commentlist -->

                </div> <!-- end col-full -->
            </div> <!-- end comments -->


            <div class="row comment-respond">

                <!-- START respond -->
                <div id="respond" class="column">

                    <h3>
                    Add Comment 
                    <span>Your email address will not be published.</span>
                    </h3>

                    <form name="contactForm" id="contactForm" method="post" action="{{ route('comment.store', $post->singlePost->id) }}" autocomplete="off">
                        @csrf
                        <fieldset>
                            <div class="form-field">
                                <input name="name" id="name" class="h-full-width h-remove-bottom" placeholder="Your Name" value="" type="text">
                                @error('name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-field">
                                <input name="email" id="email" class="h-full-width h-remove-bottom" placeholder="Your Email" value="" type="text">
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="message form-field">
                                <textarea name="comment_body" id="comment_body" class="h-full-width" placeholder="Your Message"></textarea>
                                @error('comment_body')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <br>
                            <button type="submit" class="btn btn--primary btn-wide btn--large h-full-width">Add Comment</button>

                        </fieldset>
                    </form> <!-- end form -->

                </div>
                <!-- END respond-->

            </div> <!-- end comment-respond -->

        </div> <!-- end comments-wrap -->


    </section>
@endsection