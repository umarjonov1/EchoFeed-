@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="blog post">
                            </div>
                            @auth()
                                <div class="d-flex justify-content-between">
                                    <form action="{{ route('post.like.store', $post->id) }}" method="POST">
                                        @csrf
                                        <span> {{ $post->liked_users_count }}</span>
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="fa{{  auth()->user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
                                        </button>
                                    </form>
                                </div>
                            @endauth
                            @guest()
                                <div>
                                    <span> {{ $post->liked_users_count }}</span>
                                    <i class="far fa-heart"></i>

                                </div>
                            @endguest
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>


        </div>
        </div>

    </main>
@endsection
