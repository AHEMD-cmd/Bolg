@extends('layouts.front')


@section('content')


<div class="header-spacer"></div>

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{ asset('post_img/'.$first_post->img) }}" alt="seo">
                        <div class="overlay"></div>
                        <a href="{{ asset('post_img/'.$first_post->img) }}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{ route('post.single', $first_post->slug) }}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="15_blog_details.html">{{ $first_post->title }}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published" datetime="2016-04-17 12:00:00">
                                            {{ $first_post->created_at->toFormattedDateString() }}
                                        </time>

                                    </span>

                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                        <a href="{{ route('category.single', $first_post->category->id) }}">{{ $first_post->category->name }}</a>
                                    </span>

                                    <span class="post__comments">
                                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                        6
                                    </span>

                                </div>
                        </div>
                    </div>

            </article>
        </div>
        <div class="col-lg-2"></div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{ asset('post_img/'.$second_post->img) }}" alt="seo">
                        <div class="overlay"></div>
                        <a href="{{ asset('post_img/'.$second_post->img) }}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{ route('post.single', $second_post->slug) }}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="15_blog_details.html">{{ $second_post->title }}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published" datetime="2016-04-17 12:00:00">
                                            {{ $second_post->created_at->toFormattedDateString() }}
                                        </time>

                                    </span>

                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                        <a href="{{ route('category.single', $second_post->category->id) }}">{{ $second_post->category->name }}</a>
                                    </span>

                                    <span class="post__comments">
                                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                        6
                                    </span>

                                </div>
                        </div>
                    </div>

            </article>
        </div>
        <div class="col-lg-6">
            <article class="hentry post post-standard has-post-thumbnail sticky">

                    <div class="post-thumb">
                        <img src="{{ asset('post_img/'.$third_post->img) }}" alt="seo">
                        <div class="overlay"></div>
                        <a href="{{ asset('post_img/'.$third_post->img) }}" class="link-image js-zoom-image">
                            <i class="seoicon-zoom"></i>
                        </a>
                        <a href="{{ route('post.single', $third_post->slug) }}" class="link-post">
                            <i class="seoicon-link-bold"></i>
                        </a>
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

                                <h2 class="post__title entry-title ">
                                    <a href="15_blog_details.html">{{ $third_post->title }}</a>
                                </h2>

                                <div class="post-additional-info">

                                    <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published" datetime="2016-04-17 12:00:00">
                                            {{ $third_post->created_at->toFormattedDateString() }}
                                        </time>

                                    </span>

                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                        <a href="{{ route('category.single', $third_post->category->id) }}">{{ $third_post->category->name }}</a>
                                    </span>

                                    <span class="post__comments">
                                        <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                        6
                                    </span>

                                </div>
                        </div>
                    </div>

            </article>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row medium-padding120 bg-border-color">
        <div class="container">
            <div class="col-lg-12">
                @foreach ($categories as $cat)
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <a href="{{ route('category.single', $cat->id) }}"><h4 class="h1 heading-title">{{ $cat->name }}</h4></a>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach ($cat->posts()->latest()->take(3)->get() as $post)      
                            <div class="col-lg-4  col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb mouseover poster-3d lightbox shadow animation-disabled" data-offset="5">
                                      <a href="{{ route('post.single', $post->slug) }}"><img src="{{ asset('post_img/'.$post->img) }}" alt="our case"></a>  
                                    </div>
                                    <h6 class="case-item__title">{{ $post->title }}</h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                @endforeach
            
        </div>
        </div>
    </div>
</div>

<!-- Subscribe Form -->


@stop