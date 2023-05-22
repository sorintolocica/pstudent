@extends('layouts.master')

@section('content')

    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="/">Acasă</a></li>
                        <li>Știri</li>
                    </ul>
                    <h1 class="white-text">Știri</h1>

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

                    <!-- row -->
                    <div class="row">
                        @php
                            $news = \App\Models\News::orderBy('id', 'desc')->get();
                        @endphp
                        @foreach ($news as $newsItem)
                            <div class="col-md-6">
                                <div class="single-blog">
                                    <div class="blog-img">
                                        <a href="{{ route('pages.news-post', ['id' => $newsItem['id']]) }}">
                                            <img src="{{ asset('storage/' . $newsItem['image']) }}" alt="{{$newsItem['title']}}">
                                        </a>
                                    </div>
                                    <h4><a href="{{ route('pages.news-post', ['id' => $newsItem['id']]) }}">{{ $newsItem->title }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                        <!-- /single blog -->
                    </div>
                    <!-- /row -->

                    <!-- row -->
                    <div class="row">

                        <!-- pagination -->
                        <div class="col-md-12">
                            <div class="post-pagination">
                                <a href="#" class="pagination-back pull-left">Back</a>
                                <ul class="pages">
                                    <li class="active">1</li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                </ul>
                                <a href="#" class="pagination-next pull-right">Next</a>
                            </div>
                        </div>
                        <!-- pagination -->

                    </div>
                    <!-- /row -->
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
                        <h3>Categorii</h3>
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
                        <h3>Cele mai populare stiri</h3>

                        <!-- single posts -->
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
