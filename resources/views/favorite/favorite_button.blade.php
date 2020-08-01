@if (Auth::user()->is_favorite($post->id))
{{-- お気に入り解除ボタンのフォーム --}}
{!! Form::open(['route' => ['favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
{!! Form::submit('Unfavorite', ['class' => "btn btn-dark btn-sm"]) !!}
{!! Form::close() !!}
@else
{{-- お気に入りボタンのフォーム --}}
{!! Form::open(['route' => ['favorites.favorite', $post->id]]) !!}
{!! Form::submit('Favorite', ['class' => "btn btn-info btn-sm"]) !!}
{!! Form::close() !!}
@endif