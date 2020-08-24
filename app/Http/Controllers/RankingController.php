<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

use App\Post; // 追加

class RankingController extends Controller
{
    //
    public function index()
  {
     
     
     $user = \Auth::user();

     //withCountメソッドでリレーションの数を取得
     $posts = Post::withCount('favorite_users')
     ->orderBy('favorite_users_count', 'desc')
     ->get();
     
     return view('ranking.index',[
            
            'user' => $user,
            'posts' => $posts,
        ]);

     
  }
}
