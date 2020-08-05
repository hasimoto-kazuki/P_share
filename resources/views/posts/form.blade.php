      <form method="POST" action="{{route('posts.store')}}"

            enctype="multipart/form-data">
            @csrf
       
            
        <div class="form-image">
                 
             <label for="img">画像</label>
             <input type="file" name="image" id="img">

        </div>
        
        <div class="">  <!--追加機能文字数カウント-->
            <div style="display: flex; margin-left: 115px;">  
          　<p>Count :</p>
          　<p id="inputlength">0</p>
          　</div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">内容：</label> 
            <div class="col-sm-10"> <!--追加機能文字数カウント-->
            <textarea contenteditable class="form-control" onkeyup="ShowLength(value);" name="content" rows="5">{{ old('content') }}</textarea>
            </div>
        </div>
        
        
        
        
        
            
        <div class="form-submit">
             <button type="submit">投稿する</button>
        </div>
        
       
      </form>