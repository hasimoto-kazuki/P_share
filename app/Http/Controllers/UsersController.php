<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

use Image;

use Storage;

class UsersController extends Controller
{
    //
    public function index()
    {
        // ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);

        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザの投稿一覧を作成日時の降順で取得
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザ詳細ビューでそれらを表示
        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
    /**
     * ユーザのフォロー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followings($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(10);

        // フォロー一覧ビューでそれらを表示
        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }

    /**
     * ユーザのフォロワー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followers($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(10);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        if (\Auth::id() === $user->id){
        
        return view('users.edit', [
            'user' => $user,
        ]);
        }
        
        else
        
        return redirect('/');
    }
    
    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required|max:255',
            'image' => 'required',
            'hobby' => 'required',
        ]);
        
        
        $file = $request->file('image');
        //$fileName = time()."icon.jpg";
        
        //$image = Image::make($file);
        
        //$image->resize(300,null,function($constraint){
        //  $constraint->aspectRatio();
        //});
        
        $file_path= 'images';//.$fileName;
        //$image->save(public_path().$file_path);
        
        $path = Storage::disk('s3')->putFile($file_path, $file, 'public');
        
        $user = User::findOrFail($id);
        $user->name = $request->name; 
        $user->image = $path;
        $user->hobby = $request->hobby; 
        
        $user->save();

        
        return redirect('/');
    }
    
    public function favorites($id)
    {
        
         // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザの投稿一覧を作成日時の降順で取得
        $favorites = $user->favorites()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザ詳細ビューでそれらを表示
        return view('users.favorites', [
            'user' => $user,
            'posts' => $favorites,
        ]);
    }
}
