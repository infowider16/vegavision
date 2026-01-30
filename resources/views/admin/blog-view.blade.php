@extends('admin.layouts.master')

@section('title', $blog->title)

@section('content')
<style>
    .blog-cover {
        width: 100%;
        height: auto;
        margin-bottom: 20px;
        border-radius: 10px;
    }

    .blog-content {
        font-size: 1.1rem;
        line-height: 1.6;
    }
</style>

<section class="nftmax-adashboard nftmax-show">
    <div class="nftmax-adashboard-left">
        <div class="card">
            <div class="card-body">
                <img src="{{ asset('storage/' . $blog->cover_image) }}" alt="Cover Image" class="blog-cover">
                <br>
                <br>
                <h1>{{ $blog->title }}</h1>
                <br>
                <br>
                <h3>{{ $blog->subtitle }}</h3>
                <br>
                <br>
                <div class="blog-content">
                    {!! $blog->content !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection