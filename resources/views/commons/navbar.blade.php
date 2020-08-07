<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background :linear-gradient(to top, #330000 0%, #660000 100%);">
        <!--height :80px;-->
        
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/"><i class="fas fa-home" style="margin-right: 5px;"></i>P_share</a>
        
        

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    {{-- ユーザ一覧ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('users.index', 'ユーザー一覧', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- ユーザ詳細ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.show', 'マイプロフィール', ['user' => Auth::id()]) !!}</li>
                            
                            {{-- ユーザ編集ページへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.edit', '編集', ['user' => Auth::id()]) !!}</li>
                            
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                
                @endif
            </ul>
        </div>
    </nav>
</header>
 
 