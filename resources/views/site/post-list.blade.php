@extends('layouts.site.app')

@section('content')
<!-- slider -->
    @include('layouts.site.includes.slider')
    
    <!-- Explore -->
    <section class="posts-area pt-100 pb-120">
        <div class="container">
            <div class="section-title mb-40 d-flex align-items-center justify-content-between">
                <h2>All Ads</h2>
            </div>
            <div class="post-list-view">
                @if(!empty($data['posts']))
                    @foreach($data['posts'] as $post)
                    <div class="post-list-item mb-3">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-lg-4">
                                    <div class="post-img">
                                        <a href="#">
                                            @if(!empty($post->imgUrl))
                                            <img src="{{asset('/uploads/ad/'.$post->imgUrl)}}" alt="">
                                            @else
                                            <img src="img/posts/dog.jpg" alt="...">
                                            @endif
                                        </a>
                                        <div class="post-fav">
                                            <i class="las la-heart"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <h5 class="card-title" hello>
                                            @if($post->post_type == 'auction')
                                            <a href="{{route('auction_detail',[$post->id])}}">{{$post->itemTitle ?? ''}}</a>
                                            @else
                                            <a href="{{route('post_detail',[$post->id])}}">{{$post->itemTitle ?? ''}}</a>
                                            @endif
                                        </h5>
                                        <p class="card-text">{{$post->itemDesc ?? ''}}</p>
                                        <div class="post-location mb-20">
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
                                            <div class="upload-time text-muted">{{\App\Helpers\CommonHelper::getPostTime($post->created_at)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="float-end" >
                        {{ $data['posts']->links() }}
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
