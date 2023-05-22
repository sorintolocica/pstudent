@extends('layouts.master')

@section('content')

    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{asset('./img/blog-post-background.jpg')}})"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="/">Acasă</a></li>
                        <li><a href="/news">Știri</a></li>
                        <li>{{ $news->title }}</li>
                    </ul>
                    <h1 class="white-text">{{ $news->title }}</h1>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <!-- Blog -->
    <div id="blog" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- main blog -->
                <div id="main" class="col-md-9">

                    <!-- blog post -->
                    <div class="blog-post">
                        <h2>{{$news->title}}</h2>
                        <p>{{ $news->description }}</p>
                    </div>
                    <!-- /blog post -->

                    <!-- blog share -->
                    <div class="blog-share">
                        <h4>Share This Post:</h4>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <!-- /blog share -->

                    <!-- blog comments -->
                    <div class="blog-comments">
                        @php
                            $comments = \App\Models\Comments::where('news_id', $news->id)->get();
                            $numComments = $comments->count();
                        @endphp

                        <h3>{{ $numComments > 0 ? $numComments : 0 }} comentarii</h3>

                        <!-- single comment -->
                        @foreach ($news->comments as $comment)
                        <div class="media">
                            <div class="media-left">
                                <img src="https://images.freeimages.com/365/images/istock/previews/1009/100996291-male-avatar-profile-picture-vector.jpg" alt="">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $comment->username }}</h4>
                                <p>{{ $comment->content }}</p>
                                <span>{{ $comment->created_at->format('M d, Y - g:iA') }}</span>
                            </div>
                        </div>
                            @endforeach

                        <!-- blog reply form -->
                        <div class="blog-reply-form">
                            <h3>Lasă un comentariu</h3>
                            <form action="{{ route('news.comments.store', ['newsId' => $news->id]) }}" method="POST">
                                @csrf
                                <input class="input name-input" type="text" name="username" placeholder="Nume" required>
                                <textarea class="input" name="content" placeholder="Introdu comentariul" required></textarea>
                                <button class="main-button icon-button" type="submit">Trimite</button>
                            </form>
                        </div>


                        <!-- /blog reply form -->

                    </div>
                    <!-- /blog comments -->
                </div>
                <!-- /main blog -->

                <!-- aside blog -->
                <div id="aside" class="col-md-3">

                    <!-- search widget -->
                    <div class="widget search-widget">
                        <form>
                            <input class="input" type="text" name="search">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- /search widget -->

                    <!-- category widget -->
                    <div class="widget category-widget">
                        <h3>Categories</h3>
                        @php
                            $categories = \App\Models\Category::orderBy('id', 'desc')->get();
                        @endphp
                        @foreach ($categories as $category)
                            <a class="category" href="{{ route('pages.show-category', ['category_id' => $category->id]) }}">
                                {{ $category->name }} <span>{{ $category->news_count }}</span>
                            </a>
                        @endforeach
                    </div>
                    <!-- /category widget -->

                    <!-- posts widget -->
                    <div class="widget posts-widget">
                        <h3>Postari recente</h3>

                        <!-- single posts -->
                        @php
                            $news = \App\Models\News::orderBy('id', 'desc')->get();
                        @endphp
                        @foreach ($news as $newsItem)
                            <div class="single-post">
                                <a class="single-post-img" href="{{ route('pages.news-post', ['id' => $newsItem['id']]) }}">
                                    <img src="{{ asset('storage/' . $newsItem['image']) }}" alt="{{$newsItem['title']}}">
                                </a>
                                <a href="{{ route('pages.news-post', ['id' => $newsItem['id']]) }}">{{ $newsItem->title }}</a>
                            </div>
                            <!-- /single posts -->
                        @endforeach

                    </div>
                    <!-- /posts widget -->

                    <!-- tags widget -->
                    <div class="widget tags-widget">
                        <h3>Tags</h3>
                        @php
                            $categories = \App\Models\Category::orderBy('id', 'desc')->get();
                        @endphp
                        @foreach ($categories as $category)
                            <a class="tag" href="{{ route('pages.show-category', ['category_id' => $category->id]) }}">
                                {{ $category->name }} <span>{{ $category->news_count }}</span>
                            </a>
                        @endforeach
                    </div>
                    <!-- /tags widget -->

                </div>
                <!-- /aside blog -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>
    <!-- /Blog -->

@endsection
