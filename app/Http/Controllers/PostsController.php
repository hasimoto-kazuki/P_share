<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Image;

use Storage;

class PostsController extends Controller
{
    //
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザとフォロー中ユーザの投稿の一覧を作成日時の降順で取得
            $posts = $user->feed_posts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
            'image' => 'required',
        ]);
        
        
        $file = $request->file('image');
        // $fileName = time().".jpg";
        
        // $image = Image::make($file);
        
        // $image->resize(300,null,function($constraint){
        //   $constraint->aspectRatio();
        // });
        
        // $file_path= '/images/'.$fileName;
        
        $file_path= 'images';
        
        //$image->save(public_path().$file_path;
        
        $path = Storage::disk('s3')->putFile($file_path, $file, 'public');
        
        
        
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成
        $request->user()->posts()->create([
            'content' => $request->content,
            'image' => $path,
        ]);
        

        // 前のURLへリダイレクトさせる
        return back();
    }
    
     public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $post = \App\Post::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
