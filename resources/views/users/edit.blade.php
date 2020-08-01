

@extends('layouts.app')

@section('content')

<form method="POST" action="{{route('users.update', $user->id)}}"

            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="img">アイコン画像</label>
            <input type="file" name="image" id="img">


          　
          　
          　<div class="form-name">
              <label for="name" class="form-name">名前</label>
              <input type="text" class="form-control" name="name">
            </div>

        　　<div class="form-submit">
             <button type="submit">編集する</button>
            </div>

</form>

@endsection

