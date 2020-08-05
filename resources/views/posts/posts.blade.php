


@if (count($posts) > 0)
    <ul class="list-unstyled">
        @foreach ($posts as $post)
            <li class="media mb-3">
                @if($user->image == null)
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
                        
                    </div>
                    
                    <div style="display: flex; justify-content: space-between;">
                        
                    @include('favorite.favorite_button')
                    
                    <!--追加機能 削除する前の確認機能-->
                    <div onclick="return Delete_check()" style="margin-top: 15px;">
                    <!--追加機能ここまで-->
                        @if (Auth::id() == $post->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                    
                    </div>
                    
                 </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $posts->links() }}
@endif


