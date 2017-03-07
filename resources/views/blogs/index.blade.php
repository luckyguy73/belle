@extends('layouts.app')
@include('blogs.partials.blog_style')
@section('content')

        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li class="active">Blogs</li>
            </ol>
            <div class="panel panel-default">
                <div class="panel-heading text-center h1">Blog Posts<small><a href="{{ route('blogs.create') }}"
                    class="pull-right"><img src="images/add.png" width="40" height="40" title="add new blog" alt="add new blog"> </a></small>
                </div>

                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($blogs as $blog)
                            <li class="list-group-item"><a href="{{ route('blogs.show', [$blog]) }}"><b>"{{ ucwords($blog->title) }}"</b></a>
                            <small class="text-danger"> by {{ $blog->user->name }}</small>
                            <br>{{ $blog->created_at->diffForHumans() }}</li>
                        @endforeach
                    </ul>
                    {{ $blogs->links() }}

                </div>
            </div>
        </div>

@endsection
