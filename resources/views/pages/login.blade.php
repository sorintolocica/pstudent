@extends('layouts.master')

@section('content')

    <!-- Hero-area -->
    <div class="hero-area section">
        <!-- Background Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url(./img/page-background.jpg)"></div>
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
                        <h2 class="text-center mb-4">Autentificare</h2>
                        <form method="POST" action="{{ route('pages.login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">Adresa de email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Parola</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ține-mă minte</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Autentificare</button>
                        </form>
                        <br>
                        <p class="text-center">Nu ai niciun cont? <a href="{{ route('pages.register') }}">Înregistrează-te</a></p>
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
