@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Forum Thread</div>

                    <div class="card-body">
                        <article>
                            <h4>
                                {{ $thread->title }}
                            </h4>
                            <div class="body">
                                {{ $thread->body }}
                            </div>
                            <a href="#" >{{ $thread->owner->name }}</a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @foreach($thread->replies as $reply)
                            @include('threads.reply')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @if(auth()->check())
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ $thread->path() . '/replies' }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="body">Body:</label>
                                    <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="5"></textarea>
                                </div>
                                <button type="submit" class="btn btn-info">Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center">
                <p>Please <a href=" {{ route('login') }}">sign in </a> to participate in this discussion</p>
            </div>
        @endif
    </div>


@endsection
