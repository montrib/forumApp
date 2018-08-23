<?php

namespace App\Http\Controllers;

use App\Favourites;
use App\Reply;
use Illuminate\Http\Request;

class FavouritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Reply $reply)
    {
        return $reply->favourite();
//        dd($reply);
//
//        Favourites::create([
//           'user_id' => auth()->id(),
//           'favourited_id' =>  $reply->id,
//            'favourited_type' => get_class($reply)
//        ]);

    }
}
