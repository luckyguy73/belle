@extends('layouts.app')
@include('blogs.partials.blog_style')
@section('content')
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <h1 class="panel-heading text-center">Edit your Blog</h1>
                <div class="panel-body">
                    <form action="{{ route('blogs.update', [$blog]) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        @if(count($errors))
                           <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $blog->title }}">
                        </div>
                        <div class="form-group">
                            <textarea name="body" rows="10" cols="80" class="form-control">{{ $blog->body }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-success">
                        </div>

                    </form>
                </div>
            </div>
        </div>
@endsection
