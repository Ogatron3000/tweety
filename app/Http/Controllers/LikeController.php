<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Tweet;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function store()
    {
        $tweet = Tweet::findOrFail(request('tweet_id'));

        Like::create([
            'user_id'  => auth()->id(),
            'tweet_id' => $tweet->id,
        ]);

        return back();
    }

    public function destroy($id)
    {
        $like = auth()->user()->likes()->findOrFail($id);

        $like->delete();

        return back();
    }

}
