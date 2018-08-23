<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function favourites()
    {
        return $this->morphMany('App\Favourites', 'favourited');
    }

    public function favourite()
    {
        if(! $this->favourites()->where(['user_id' => auth()->id()])->exists()) {
            $this->favourites()->create(['user_id' => auth()->id()]);
        }

    }
}
