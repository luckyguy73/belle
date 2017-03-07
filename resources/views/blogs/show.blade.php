@extends('layouts.app')
@include('blogs.partials.blog_style')
@section('content')

        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
              <li class="active">{{ ucwords($blog->title) }}</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading text-center h1">{{ ucwords($blog->title) }}<small> by {{ $blog->user->name }}</small>
                </div>

                <div class="panel-body">
                    {!! nl2br(e($blog->body)) !!}
                    @if(Auth::user()->id === $blog->user_id)
                        <hr>
                        <p>
                            <a class="btn btn-success" href="{{ route('blogs.edit', [$blog]) }}" role="button">Edit Blog</a>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-blog-{{ $blog->id }}').submit();"
                                class="btn btn-danger" role="button">Delete Blog</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>

    <form action="{{ route('blogs.destroy', [$blog]) }}" method="post" id="delete-blog-{{ $blog->id }}">
        {{ csrf_field() }}
        {{ method_field('delete') }}
    </form>
@endsection
