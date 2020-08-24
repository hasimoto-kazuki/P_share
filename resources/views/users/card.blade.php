<div class="text-center">

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fab fa-sketch" style="margin-right: 5px;"></i>{{ $user->name }}</h3>
    </div>
    
   
    
    <div class="card-body">
        @if($user->image == null)
        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
        <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 108]) }}" alt="">
        
        @else
        
        <img class="rounded img-fluid" src="{{ Storage::disk('s3')->url($user->image) }}" alt="" style="height: 108px; width: 108px;">
        
        @endif
        
        @if($user->hobby == null)
        <p style="font-size: 20px;">趣味： 選択しない</p>
        @else
        <p style="font-size: 20px;">趣味： {{ $user->hobby }}</p>
        @endif
        
    </div>
</div>

</div>
<!--追加機能　余白-->
<div style="margin-top: 30px;">
<!--追加機能ここまで-->
{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')

</div>