@if (Auth::user()->is_favorite($post->id))
{{-- お気に入り解除ボタンのフォーム --}}
{!! Form::open(['route' => ['favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
<button type="submit" class="btn" style="font-size: 30px; color: blue;"><i class="fas fa-heart-broken"></i></button>
{!! Form::close() !!}
@else
{{-- お気に入りボタンのフォーム --}}
{!! Form::open(['route' => ['favorites.favorite', $post->id]]) !!}
<button type="submit" class="btn" style="font-size: 30px; color: red;"><i class="fas fa-heart"></i></button>
{!! Form::close() !!}
@endif

