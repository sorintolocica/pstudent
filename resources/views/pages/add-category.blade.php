@extends('layouts.master')

@section('content')

    <!-- Hero-area -->
    <div class="hero-area section">
        <!-- Background Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{asset('./img/page-background.jpg')}})"></div>
        <!-- /Background Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="/">Acasa</a></li>
                        <li>Autentificare</li>
                    </ul>
                    <h1 class="white-text">Autentificare</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /Hero-area -->

    <!-- Contact -->
    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row justify-content-center">

                <!-- contact form -->
                <div class="col-lg-12">
                    <div class="contact-form">
                        <h2 class="text-center mb-4">Adauga categorie</h2>
                        <form method="POST" action="{{ route('pages.add-category') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nume categorie:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Adaugă categorie</button>
                        </form>
                        <br>
                    </div>
                </div>
                <!-- /contact form -->

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </div>
    <!-- /Contact -->
@endsection
