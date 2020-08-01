<div class="text-center">

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fab fa-sketch" style="margin-right: 5px;"></i>{{ $user->name }}</h3>
    </div>
    
   
    
    <div class="card-body">
        @if($user->image == null)
        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
        <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 225]) }}" alt="">
        
        @else
        <img class="rounded img-fluid" src="{{ Storage::disk('s3')->url($user->image) }}" alt="" style="height: 225px; width: 225px">
        @endif
    </div>
</div>

</div>

{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button')