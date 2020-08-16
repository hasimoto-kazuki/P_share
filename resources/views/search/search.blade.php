@extends('layouts.app')



@section('content')
<div class="row">
        <div class="col-sm-4">
            <div class="text-center my-4">
                <h3 class="brown p-2">ユーザ検索</h3>
            </div>
            {!! Form::open(['route' => 'search', 'method' => 'get']) !!}
                <div class="form-group">
                    {!! Form::label('text', 'ユーザ名:') !!}
                    {!! Form::text('name' ,'', ['class' => 'form-control', 'placeholder' => '指定なし'] ) !!}
                </div>
                
                
                {!! Form::submit('検索', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-sm-8">
            <div class="text-center my-4">
                <h3 class="brown p-2">ユーザ一覧</h3>
            </div>

            <div class="container">
                <!--検索ボタンが押された時に表示されます-->
                @if(!empty($data))
                    <div class="my-2 p-0">
                        <div class="row  border-bottom text-center">
                            <div class="col-sm-4">
                                <p>ユーザ名</p>
                                
                                
                                
                            </div>
                            
                        </div>
　　　　　　　　　　　　　　<!--検索条件に一致したユーザを表示します-->
                        @foreach($data as $user)
                                <div class="row py-2 border-bottom text-center">
                                    <div class="col-sm-4">
                                        {{ $user->name }}
                                        
                                    </div>
                                    
                                @if($user->image == null)
                                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                                    <img class="" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="" style="border-radius: 50%;">
                
                                @else
                                    <img class="" src="{{ Storage::disk('s3')->url($user->image) }}" alt="" style="height: 50px; width: 50px; border-radius: 50%;">
                                @endif
                                    
                                <div>
                                    {{-- ユーザ詳細ページへのリンク --}}
                                    <p>{!! link_to_route('users.show', 'プロフィール', ['user' => $user->id]) !!}</p>
                                </div>
                                    
                                    
                                   
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                
                                
                                </div>
                        @endforeach
                    </div>
                    {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
                @endif
            </div>
        </div>
    </div>
@endsection