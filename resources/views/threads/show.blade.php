@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
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
                <div class="card">
                    <div class="card-body">
                        @foreach($replies as $reply)
                            @include('threads.reply')
                        @endforeach
                    </div>
                    {{ $replies->links() }}
                </div>
                @if(auth()->check())
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
                @else
                    <p>Please <a href=" {{ route('login') }}">sign in </a> to participate in this discussion</p>
                @endif
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p>
                            this thread was published {{ $thread->created_at->diffForHumans() }} by
                            <a href="#">
                                {{ $thread->owner->name }}</a> and currently has {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}

                        </p>
                    </div>
                </div>
            </div>
        </div>




    </div>


@endsection
