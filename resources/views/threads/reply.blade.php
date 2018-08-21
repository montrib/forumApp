<div class="body">
    {{ $reply->body }}
</div>
<div class="card-header">
    <a href="#">{{ $reply->owner->name }}</a>
    responded {{ $reply->created_at->diffForHumans() }}</div>
<hr>