<ul class="nav nav-tabs nav-justified mb-3">
    {{-- ユーザ詳細タブ --}}
    <li class="nav-item">
        <a style="color: #000011;" href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
            投稿一覧
            <span class="badge badge-secondary">{{ $user->posts_count }}</span>
        </a>
    </li>
    {{-- フォロー一覧タブ --}}
    <li class="nav-item">
        <a style="color: #000011;" href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            フォロー
            <span class="badge badge-secondary">{{ $user->followings_count }}</span>
        </a>
    </li>
    {{-- フォロワー一覧タブ --}}
    <li class="nav-item">
        <a style="color: #000011;" href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
            フォロワー
            <span class="badge badge-secondary">{{ $user->followers_count }}</span>
        </a>
    </li>
    {{-- お気に入り一覧タブ --}}
    <li class="nav-item">
        <a style="color: #000011;" href="{{ route('users.favorites', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.favorites') ? 'active' : '' }}">
            いいね<i class="fas fa-heart" style="font-size: 20px; color: red;"></i>
            <span class="badge badge-secondary">{{ $user->favorites_count }}</span>
        </a>
    </li>
    
</ul>