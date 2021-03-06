@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create Article
                </div>
                <div class="panel-body">
                    <form method="POST" action="/articles">
                        {{ csrf_field() }}

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        
                        <div class="form-group">
                            <label for="article_content">Content</label>
                            <textarea class="form-control" name="article_content"></textarea>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="live">
                                Live
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="post_on">Post on</label>
                            <input type="datetime-local" name="post_on" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-success pull-right" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection