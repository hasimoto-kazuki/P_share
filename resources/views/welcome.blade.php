@extends('layouts.app')



@section('content')
　　@if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                {{-- ユーザ情報 --}}
                @include('users.card')
            </aside>
            <div class="col-sm-8">
                {{-- 投稿フォーム --}}
                @include('posts.form')
                {{-- 投稿一覧 --}}
                @include('posts.posts')
            </div>
        </div>
        

    
        
    @else    
    <div class="center jumbotron" style="background:url({{ asset('images/image01.jpg') }}); background-size:cover;">
        <div class="text-center">
            <h1 style="color: white; margin-top: 200px; font-style:oblique;">P_shareへようこそ！</h1>
            
            <h3 style="color: white; margin-top: 100px">ここではあなたの趣味であったり、普段の生活の出来事をつぶやいて<br>
            みんなで共有し合う場所です<br>
            まずは登録からどうぞ
            </h3>
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', '登録', [], ['class' => 'btn btn-lg btn-dark']) !!}
            {{-- ユーザログインページへのリンク --}}
            {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-dark']) !!}
            
        </div>
    </div>
    @endif
@endsection



