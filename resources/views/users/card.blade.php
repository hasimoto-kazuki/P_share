<div class="text-center">

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fab fa-sketch" style="margin-right: 5px;"></i>{{ $user->name }}</h3>
    </div>
    
   
    
    <div class="card-body">
        @if($user->image == null)
        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
        <img class="" src="{{ Gravatar::get($user->email, ['size' => 225]) }}" alt="" style="border-radius: 50%;">
        
        @else
        <img class="" src="{{ Storage::disk('s3')->url($user->image) }}" alt="" style="height: 225px; width: 225px; border-radius: 50%;">
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