@extends('layouts.app')



@section('content')

<div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-8">
            
            
        

@if (count($posts) > 0)
    <ul class="list-unstyled">
        @foreach ($posts as $post)
            <li class="media mb-3">
                @if($post->user->image == null)
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="" src="{{ Gravatar::get($post->user->email, ['size' => 50]) }}" alt="" style="border-radius: 50%;">
        
                @else
                <img class="" src="{{ Storage::disk('s3')->url($post->user->image) }}" alt="" style="height: 50px; width: 50px; border-radius: 50%;">
                @endif
                
                 <div class="media-body">
                     <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $post->user->name, ['user' => $post->user->id]) !!}
                        <span class="text-muted">posted at {{ $post->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($post->content)) !!}</p>
                        
                        {{-- 投稿画像 --}}
                        <img src="{{ Storage::disk('s3')->url($post->image) }}" style="height: 300px; width: 300px; margin-bottom: 30px;">
                        
                        <p><i class="fas fa-crown" style="color: orange; font-size: 25px;"></i><span class="badge badge-secondary" style="font-size: 20px;">{{ $post->favorite_users_count }}</span></p>
                        
                    </div>
                    
                    
                    
                 </div>
            </li>
        @endforeach
    </ul>
    
    
@endif
        </div>
</div>

@endsection