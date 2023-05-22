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
                        <h2 class="text-center mb-4">Posteaza o stire</h2>
                        <form method="POST" action="{{ route('add-news') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Titlu:</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Descriere:</label>
                                <textarea name="description" class="form-control" rows="5" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Imagine:</label>
                                <input type="file" name="image" class="form-control-file">
                            </div>

                            <div class="form-group">
                                <label for="category">Categorie:</label>
                                <select name="category" class="form-control">
                                    @php
                                        $categories = \App\Models\Category::orderBy('id', 'desc')->get();
                                    @endphp
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Adaugă</button>
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
