@extends('layouts.site.app')

@section('content')
<!-- slider -->
    @include('layouts.site.includes.slider')
    <section class="slider-area d-none">
        <div class="slider owl-carousel">
            @if(!empty($data['sliders']))
                @foreach($data['sliders'] as $slide)
                <div class="slider-item" style="background-image: url({{ asset('/uploads/slider/' . $slide->image) }});">
                    <div class="container">
                        <div class="slider-content">
                            <h2 class="title">{{$slide->title ?? ''}}</h2>
                            <p class="desc">{{$slide->description ?? ''}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </section>
    {{ __('I love programming.') }}
    <!-- feature ads -->
    <section class="posts-area pt-140 pb-65">
        <div class="container">
            <div class="posts feature-post owl-carousel">
                @if(!empty($data['featuredPosts']))
                    @foreach($data['featuredPosts'] as $feature)
                    <div class="post-item">
                        <div class="post-img">
                            <a href="#">
                                @if(!empty($feature->imgUrl))
                                <img src="{{asset('/uploads/ad/'.$feature->imgUrl)}}" alt="">
                                @else
                                <img src="/assets/img/posts/post-1.png" alt="">
                                @endif
                            </a>
                            <span class="post-badge">Featured</span>
                            <div class="post-fav">
                                <i class="las la-heart"></i>
                            </div>
                        </div>
                        <div class="post-body">
                            <h2 class="post-title">
                                @if($feature->post_type == 'auction')
                                <a href="{{route('auction_detail',[$feature->id])}}">{{$feature->itemTitle ?? ''}}</a>
                                @else
                                <a href="{{route('post_detail',[$feature->id])}}">{{$feature->itemTitle ?? ''}}</a>
                                @endif
                            </h2>
                            <p class="post-desc">{{$feature->itemDesc ?? ''}}</p>
                            <div class="post-location">
                                <i class="las la-map-marker-alt"></i>
                                <span>{{$feature->city ?? ''}}</span>
                            </div>
                            <div class="post-author">
                                <div class="author">
                                    <a href="#">
                                        <img src="/assets/img/posts/author.png" alt="">
                                        <span class="author-name">{{$feature->author ?? ''}}</span>
                                    </a>
                                </div>
                                <div class="upload-time">{{\App\Helpers\CommonHelper::getPostTime($feature->created_at)}}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- service category -->
    <section class="service-category-area pt-65 pb-65">
        <div class="container">
            <div class="section-title mb-40 d-flex align-items-center justify-content-between">
                <h2>Services Category</h2>
                <a href="#" class="see-all-link mb-10">See all<i class="las la-angle-right"></i></a>
            </div>
            <div class="service-category owl-carousel">
                @if(!empty($data['categories']))
                    @foreach($data['categories'] as $category)
                        <a href="#" class="category-item">
                            <div class="category-icon">
                                <img src="{{asset('/uploads/category/'.$category->cat_img)}}" alt="">
                            </div>
                            <h3 class="category-title">{{$category->title ?? '' }}</h3>
                        </a>
                    @endforeach
                @endif
            </div>
            <div class="category-tag">
                <a href="#" class="tag-item">German Shepherd Dog</a>
                <a href="#" class="tag-item">Siberian Husky Dog</a>
                <a href="#" class="tag-item">Doberman Dog</a>
                <a href="#" class="tag-item">Bulldog</a>
                <a href="#" class="tag-item">Poodle Dog</a>
            </div>
        </div>
    </section>
    <!-- posts -->
    <section class="posts-area section--padding">
        <div class="container">
            <div class="section-title mb-40 d-flex align-items-center justify-content-between">
                <h2>Posts</h2>
                <a href="{{route('posts')}}" class="see-all-link mb-10">See all<i class="las la-angle-right"></i></a>
            </div>
            <div class="posts owl-carousel">
                @if(!empty($data['posts']))
                    @foreach($data['posts'] as $post)
                    <div class="post-item">
                        <div class="post-img">
                            <a href="#">
                                @if(!empty($post->imgUrl))
                                <img src="{{asset('/uploads/ad/'.$post->imgUrl)}}" alt="">
                                @else
                                <img src="/assets/img/posts/post-1.png" alt="">
                                @endif
                            </a>
                            <div class="post-fav">
                                <i class="las la-heart"></i>
                            </div>
                        </div>
                        <div class="post-body">
                            <h2 class="post-title"><a href="{{route('post_detail',[$post->id])}}">{{$post->itemTitle ?? ''}}</a></h2>
                            <p class="post-desc">{{$post->itemDesc ?? ''}}</p>
                            <div class="post-location">
                                <i class="las la-map-marker-alt"></i>
                                <span>{{$post->city ?? ''}}</span>
                            </div>
                            <div class="post-author">
                                <div class="author">
                                    <a href="#">
                                        <img src="/assets/img/posts/author.png" alt="">
                                        <span class="author-name">{{$post->author ?? ''}}</span>
                                    </a>
                                </div>
                                <div class="upload-time">{{\App\Helpers\CommonHelper::getPostTime($post->created_at)}}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- auctions -->
    <section class="posts-area section--padding">
        <div class="container">
            <div class="section-title mb-40 d-flex align-items-center justify-content-between">
                <h2>Auctions</h2>
                <a href="{{route('posts',['auction'])}}" class="see-all-link mb-10">See all<i class="las la-angle-right"></i></a>
            </div>
            <div class="posts owl-carousel">
                @if(!empty($data['auction']))
                    @foreach($data['auction'] as $post)
                    <div class="post-item">
                        <div class="post-img">
                            <a href="#">
                                @if(!empty($post->imgUrl))
                                <img src="{{asset('/uploads/ad/'.$post->imgUrl)}}" alt="">
                                @else
                                <img src="/assets/img/posts/post-1.png" alt="">
                                @endif
                            </a>
                            <div class="post-fav">
                                <i class="las la-heart"></i>
                            </div>
                        </div>
                        <div class="post-body">
                            <h2 class="post-title"><a href="{{route('auction_detail',[$post->id])}}">{{$post->itemTitle ?? ''}}</a></h2>
                            <p class="post-desc">{{$post->itemDesc ?? ''}}</p>
                            <div class="post-location">
                                <i class="las la-map-marker-alt"></i>
                                <span>{{$post->city ?? ''}}</span>
                            </div>
                            <div class="post-author">
                                <div class="author">
                                    <a href="#">
                                        <img src="/assets/img/posts/author.png" alt="">
                                        <span class="author-name">{{$post->author ?? ''}}</span>
                                    </a>
                                </div>
                                <div class="upload-time">{{\App\Helpers\CommonHelper::getPostTime($post->created_at)}}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- Explore -->
    <section class="posts-area pt-65 pb-140">
        <div class="container">
            <div class="section-title mb-40 d-flex align-items-center justify-content-between">
                <h2>Explore</h2>
                <a href="{{route('articles')}}" class="see-all-link mb-10">See all<i class="las la-angle-right"></i></a>
            </div>
            <div class="posts owl-carousel">
                @if(!empty($data['articles']))
                    @foreach($data['articles'] as $article)
                    <div class="post-item">
                        <div class="post-img">
                            <a href="#">
                                @if(!empty($article->image))
                                <img src="{{asset('/uploads/article/'.$article->image)}}" alt="">
                                @else
                                <img src="/assets/img/explore/ex-1.png" alt="">
                                @endif
                            </a>
                            <div class="post-fav">
                                <i class="las la-heart"></i>
                            </div>
                        </div>
                        <div class="post-body">
                            <a href="{{route('article_detail', [$article->id])}}" class="post-category">{{$article->title ?? ''}}</a>
                            <h2 class="post-title mb-15">{{!empty($article->description) ? mb_substr(strip_tags($article->description), 0, 100) : ''}}
                            </h2>
                            <div class="upload-date">{{\App\Helpers\CommonHelper::getPostTime($article->date)}}</div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
@endsection
