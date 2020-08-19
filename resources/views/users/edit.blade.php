

@extends('layouts.app')

@section('content')

<form method="POST" action="{{route('users.update', $user->id)}}"

            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-image">
              <label for="img">アイコン画像</label>
              <input type="file" name="image" id="img">
            </div>
             
          　
          　
          　<div class="form-name">
              <label for="name" class="form-name">名前</label>
              <input type="text" class="col-sm-4 form-control" name="name">
            </div>
            
            <div class="form-hobby">
              <label for="hobby">趣味</label>
              <select name="hobby" style="margin-top: 30px;">
              @foreach(config('hobby') as $key => $name)
                <option value="{{ $key }}">{{ $name }}</option>
              @endforeach
              </select>
            </div>

        　　<div class="form-submit">
             <button type="submit">編集する</button>
            </div>

</form>

@endsection

