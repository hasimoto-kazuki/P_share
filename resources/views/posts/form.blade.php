      <form method="POST" action="{{route('posts.store')}}"

            enctype="multipart/form-data">
            @csrf

            <label for="img">画像</label>
            <input type="file" name="image" id="img">


          　<div class="form-content">
            　<label for="content" class="form-content">内容</label> 
            　<textarea class="form-control" name="content" cols="80" rows="5">{{ old('content') }}</textarea>       
          　</div>

        　　<div class="form-submit">
             <button type="submit">投稿する</button>
            </div>

      </form>

