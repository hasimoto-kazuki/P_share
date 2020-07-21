@extends('layouts.app')

@section('content')
　　@if (Auth::check())
        
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        {{-- 認証済みユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded img-fluid" src="{{ Gravatar::get(Auth::user()->email, ['size' => 500]) }}" alt="">
                    </div>
                </div>
            </aside>
            
            
            
            <div class="col-sm-8">
                {{-- 投稿一覧 --}}
                @include('posts.posts')
            </div>
        </div>
        
    @else    
    <div class="center jumbotron" style="background-color: #CCFFFF;">
        <div class="text-center">
            <h1>P_shareへようこそ！</h1>
        </div>
    </div>
    <div class="text-center">
            <h3>ここではあなたの趣味であったり、普段の生活の出来事をつぶやいて<br>
            みんなで共有し合う場所です<br>
            まずは登録からどうぞ
            </h3>
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', '登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
            {{-- ユーザログインページへのリンク --}}
            {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
    </div>
    @endif
@endsection
