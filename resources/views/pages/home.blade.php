@extends('layouts.master')

@section('content')

    <!-- Home -->
    <div id="home" class="hero-area">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{asset('./img/home-background.jpg')}})"></div>
        <!-- /Backgound Image -->

        <div class="home-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="white-text">Știri Educaționale</h1>
                        <p class="lead white-text">Aici vei gasi ultimele noutati si informatii pentru studenti.</p>
                        <a class="main-button icon-button" href="#">Citeste mai mult!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- /Home -->

    <!-- About -->
    <div id="about" class="section">

        <!-- container -->
        <div class="container">

            <div class="col-md-6">
                <div class="section-header">
                    <h2>Bun venit la Știri Educaționale</h2>
                    <p class="lead">Aici vei gasi cele mai recente stiri si informatii utile pentru studenti.</p>
                </div>

                <!-- feature -->
                <div class="feature">
                    <i class="feature-icon fa fa-newspaper-o"></i>
                    <div class="feature-content">
                        <h4>Stiri Educationale</h4>
                        <p>Afla ultimele noutati din domeniul educational, evenimente si schimbari importante.</p>
                    </div>
                </div>
                <!-- /feature -->

                <!-- feature -->
                <div class="feature">
                    <i class="feature-icon fa fa-graduation-cap"></i>
                    <div class="feature-content">
                        <h4>Informatii pentru Studenti</h4>
                        <p>Descopera informatii utile referitoare la admitere, burse, si alte resurse pentru studenti.</p>
                    </div>
                </div>
                <!-- /feature -->

                <!-- feature -->
                <div class="feature">
                    <i class="feature-icon fa fa-users"></i>
                    <div class="feature-content">
                        <h4>Comunitate</h4>
                        <p>Fa parte dintr-o comunitate de studenti, unde poti interactiona si schimba experiente cu alti colegi.</p>
                    </div>
                </div>
                <!-- /feature -->

            </div>

            <div class="col-md-6">
                <div class="about-img">
                    <img src="./img/about.png" alt="">
                </div>
            </div>

        </div>
        <!-- row -->

    </div>
    <!-- container -->
    </div>
    <!-- /About -->

    <!-- Courses -->
    <div id="courses" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">
                <div class="section-header text-center">
                    <h2>Stiri Educationale</h2>
                    <p class="lead">Aici gasesti cele mai recente stiri si informatii pentru studenti.</p>
                </div>
            </div>
            <!-- /row -->

            <!-- courses -->
            <div id="courses-wrapper">

                <!-- row -->
                <div class="row">

                    @foreach ($news as $newsItem)
                    <!-- single course -->
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="course">
                            <a href="{{ route('pages.news-post', ['id' => $newsItem['id']]) }}" class="course-img">
                                <img src="{{ asset('storage/' . $newsItem['image']) }}" alt="{{$newsItem['title']}}">
                                <i class="course-link-icon fa fa-link"></i>
                            </a>
                            <a class="course-title" href="{{ route('pages.news-post', ['id' => $newsItem['id']]) }}">{{ $newsItem->title }}</a>
                        </div>
                    </div>
                    <!-- /single course -->
                    @endforeach
                </div>
                <!-- /row -->

            <!-- /courses -->

            <div class="row">
                <div class="center-btn">
                    <a class="main-button icon-button" href="#">Caută mai multe știri pentru studenți</a>
                </div>
            </div>
<br>
        </div>
        <!-- container -->

    </div>
    <!-- /Courses -->
@endsection
