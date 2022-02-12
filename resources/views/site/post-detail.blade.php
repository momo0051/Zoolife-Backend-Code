@extends('layouts.site.app')

@section('content')
    <!-- post details -->
    <section class="post-details pt-65 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 mb-30">
                    <div class="post-details-slider owl-carousel mb-30 pb-5">
                        <div class="post-details-single">
                            <div class="post-details-img">
                                @if(!empty($post->imgUrl))
                                <!-- <img src="{{$post->imgUrl}}" alt=""> -->
                                <img src="{{\App\Helpers\CommonHelper::getWebUrl($post->imgUrl, 'ad')}}" alt="">
                                @else
                                <img src="/assets/img/posts/post-2.png" alt="">
                                @endif
                            </div>
                        </div>
                        @if(!empty($post->images))
                            @foreach($post->images as $img)
                            <div class="post-details-single">
                                <div class="post-details-img">
                                    <img src="{{$img->file_name}}" alt="">
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="post-author-details">
                        <h2 class="title">{{$post->itemTitle ?? ''}}</h2>
                        <div class="post-author-location">
                            <div class="icon-text" style="color: var(--theme-color);">
                                <i class="lar la-calendar"></i>
                                <span>{{\App\Helpers\CommonHelper::getPostTime($post->created_at)}}</span>
                            </div>
                            <div class="icon-text">
                                <i class="lar la-user"></i>
                                <span>{{$post->author ?? ''}}</span>
                            </div>
                            <div class="icon-text">
                                <i class="las la-map-marker"></i>
                                <span>{{$post->city ?? ''}}, {{$post->country ?? ''}}</span>
                            </div>
                            <div class="icon-text">
                                <i class="las la-id-card"></i>
                                <span>{{$post->phone ?? ''}}</span>
                            </div>
                        </div>
                        <div class="post-action-btn">
                            <a href="tel:{{$post->phone ?? ''}}" class="btn theme-btn"><i class="las la-phone fs-25"></i>{{ __('Call') }}</a>
                            <a href="#" class="btn theme-btn-outline"><i class="lab la-rocketchat fs-25"></i>{{ __('Chat') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- post specification -->
    <section class="post-specification pb-140 d-none">
        <div class="container">
            <div class="section-title mb-30">
                <h2>{{ __('Post Specification') }}</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="post-specification-content">
                        <p>{{$post->itemDesc ?? ''}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- post info -->
    <section class="post-info pb-140">
        <div class="container">
            <div class="section-title mb-30">
                <h2>{{ __('Details') }}</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="post-info-box">
                        <div class="post-info-list">
                            <div>{{ __('Age') }}</div>
                            <div>{{$post->age ?? ''}}</div>
                        </div>
                        <div class="post-info-list">
                            <div>{{ __('Sex') }}</div>
                            <div>{{$post->sex ?? ''}}</div>
                        </div>
                        <div class="post-info-list">
                            <div>{{ __('Passport') }}</div>
                            <div>{{$post->passport ?? ''}}</div>
                        </div>
                        <div class="post-info-list">
                            <div>{{ __('Vacine Details') }}</div>
                            <div>{{$post->vaccine_detail ?? ''}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- post description -->
    <section class="post-description pb-140">
        <div class="container">
            <div class="section-title mb-30">
                <h2>{{ __('Description') }}</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="post-specification-content mb-30">
                        <p>{{$post->itemDesc ?? ''}}</p>
                    </div>
                    <div class="description-btn">
                        <a href="#" class="btn btn-red w-auto"><i class="lar la-thumbs-up fs-25"></i>{{ __('Like') }}</a>
                        <a href="#" class="btn theme-btn w-auto"><i class="las la-share fs-25"></i>{{ __('Share') }}</a>
                        <a href="#" class="btn btn-green w-auto"><i class="lab la-whatsapp fs-25"></i>{{ __('Whatsapp') }}</a>
                        <a href="#" class="btn btn-yellow w-auto"><i class="lar la-heart fs-25"></i>{{ __('Add to Favorite') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- warning msg -->
    <section class="warning-message pt-60 pb-150">
        <div class="container">
            <div class="alert alert-warning alert-dismissible fade show position-relative" role="alert">
                <h4 class="alert-heading">{{ __('Warning!') }}</h4>
                <p>“Zoolife” warns against deadline outside the application and strongly advises to deal through Private messages only, to deal hand in hand, to beware of agents, and to make sure that the bank account belongs to the same person who owns the goods.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="las la-times"></i></button>
            </div>
        </div>
    </section>
    <!-- write a comment -->
    <section>
        <div class="container">
            <div class="section-title mb-30">
                <h2>{{ __('Write a Comment') }}</h2>
            </div>
            <div class="comment-form mb-30">
                <input type="text" placeholder="Type here">
                <a href="#" class="btn theme-btn">{{ __('Send') }}</a>
            </div>
            <div class="all-comments">
                <h3 class="title mb-30">{{ __('Comment') }}</h3>
                <div class="comment-list">
                    <div class="single-comment">
                        <div class="comment-img">
                            <a href="#"><img src="/assets/img/posts/author.png" alt=""></a>
                        </div>
                        <div class="comment-text-box">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="#" class="commenter-name">Marvin McKinney</a>
                                <span class="comment-time">Friday 2:20pm</span>
                            </div>
                            <div class="comment-text">Hey Bruce, can you please review the latest design when you can?</div>
                        </div>
                    </div>
                    <div class="single-comment">
                        <div class="comment-img">
                            <a href="#"><img src="/assets/img/posts/author.png" alt=""></a>
                        </div>
                        <div class="comment-text-box">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="#" class="commenter-name">Marvin McKinney</a>
                                <span class="comment-time">Friday 2:20pm</span>
                            </div>
                            <div class="comment-text">Hey Bruce, can you please review the latest design when you can?</div>
                        </div>
                    </div>
                    <div class="single-comment">
                        <div class="comment-img">
                            <a href="#"><img src="/assets/img/posts/author.png" alt=""></a>
                        </div>
                        <div class="comment-text-box">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="#" class="commenter-name">Marvin McKinney</a>
                                <span class="comment-time">Friday 2:20pm</span>
                            </div>
                            <div class="comment-text">Hey Bruce, can you please review the latest design when you can?</div>
                        </div>
                    </div>
                    <div class="comment-action-btn">
                        <a href="#" class="btn btn-link m-auto">View All</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- similar ads -->
    @if(!empty($post->relatedPosts))
    <section class="posts-area pt-65 pb-140">
        <div class="container">
            <div class="section-title mb-40 d-flex align-items-center justify-content-between">
                <h2>{{ __('Similar Ads') }}</h2>
                <a href="#" class="see-all-link mb-10">See all<i class="las la-angle-right"></i></a>
            </div>
            <div class="posts owl-carousel">
                @foreach($post->relatedPosts as $rPost)
                    <div class="post-item">
                        <div class="post-img">
                            <a href="{{route('post_detail',[$rPost->id])}}">
                                @if(!empty($rPost->image))
                                <img src="{{asset('/uploads/article/'.$rPost->image)}}" alt="">
                                @endif
                            </a>
                            <div class="post-fav">
                                <i class="las la-heart"></i>
                            </div>
                        </div>
                        <div class="post-body">
                            <a class="post-category" href="{{route('post_detail',[$rPost->id])}}">{{$post->itemTitle ?? ''}}</a>
                            <h2 class="post-title mb-15"><a href="#">{{$rPost->itemDesc ?? ''}}</a>
                            </h2>
                            <div class="upload-date">{{\App\Helpers\CommonHelper::getPostTime($rPost->created_at)}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection
