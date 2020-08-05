@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                @if($user->image == null)
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="" style="border-radius: 50%;">
                
                @else
                <img class="" src="{{ Storage::disk('s3')->url($user->image) }}" alt="" style="height: 50px; width: 50px; border-radius: 50%;">
                @endif
                
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p>{!! link_to_route('users.show', 'プロフィール', ['user' => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    
    {{-- ページネーションのリンク --}}
    {{ $users->links() }}
    
@endif