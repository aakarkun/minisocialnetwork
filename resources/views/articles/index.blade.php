@extends('layouts.app')

@section('content')

    <div class="row">

        @forelse($articles as $article)

            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="text-info">{{ Auth::user()->username }}</span>
                        <span class="pull-right">{{ $article->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="panel-body">
                        {{ $article->ShortArticleContent }}
                        <br />
                        <a href="/articles/{{ $article->id }}" class="pull-right">Read more</a>
                    </div>
                    <div class="panel-footer clearfix">
                        <i class="fa fa-heart pull-right"></i>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Articles
                    </div>
                    <div class="panel-body">
                        <span class="text-uppercase">No Articles Found</span>
                    </div>
                </div>
            </div>

        @endforelse
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center">
            {{ $articles->links() }}
        </div>
    </div>

@endsection