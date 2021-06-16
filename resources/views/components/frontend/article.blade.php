<div class="bricks-wrapper h-group" style="position: relative; height: 2373px;">

    <div class="grid-sizer"></div>

    <div class="lines">
        <span></span>
        <span></span>
        <span></span>
    </div>
    @foreach ($forntendPostModel->nonStickyPost as $post)
        
        <article class="brick entry aos-init aos-animate" data-aos="fade-up" style="position: absolute; left: 0%; top: 0px;">

            @if ($post->image)
                <div class="entry__thumb">
                    <a href="{{ route('post', $post->id) }}" class="thumb-link">
                        <img src="{{ $post->image }}" alt="">
                    </a>
                </div> <!-- end entry__thumb -->
            @endif

            <div class="entry__text">
                <div class="entry__header">
                    <h1 class="entry__title"><a href="{{ route('post',$post->slug) }}">{{ $post->title }}</a></h1>
                    
                    <div class="entry__meta">
                        <span class="byline" "="">By:
                            <span class="author">
                                <a href="#">{{ $post->user->name }}</a>
                        </span>
                    </span>
                    <span class="byline" "="">Category:
                        <span class="cat-links">
                            <a href="{{ route('category.show',$post->category->cat_url) }}">{{ $post->category->cat_name }}</a>
                        </span>
                    </span>
                    <span class="byline" "="">Tags:
                        <span class="cat-links">
                            <a href="https://www.dreamhost.com/r.cgi?287326">
                                @foreach ($post->tags as $tag)
                                    {{ $tag->tag_name }}@if (!$loop->last),@endif
                                @endforeach
                            </a>
                        </span>
                    </span>
                    </div>
                </div>
                <div class="entry__excerpt">
                    <p>
                        {!! Str::words($post->description, 30, '...') !!}
                    </p>
                </div>
                <a class="entry__more-link" href="{{ route('post',$post->slug) }}">Learn More</a>
            </div> <!-- end entry__text -->
        
        </article> <!-- end article -->
    @endforeach

</div> <!-- end brick-wrapper -->