@extends('layouts.app')
@section('content')

<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h2 class="panel-title">{{ $hospital->name }}</h2>
        </div>
        <div class="panel-body clearfix">
            <div class="hospital-img">
                @if(isset($hospital->image_name))
                    <a><img src="{{ secure_asset("images/$hospital->image_name") }}" alt="{{ $hospital->image_name }}"></a>
                @else
                    <a><img src="{{ secure_asset("images/default.jpg") }}" alt="no-img"></a>
                @endif
            </div>
            <div class="hospital-detail">
                <p><span class="glyphicon glyphicon-home"></span>住所：{{ $hospital->prefecture['prefecture']}}{{ $hospital->address}}</p>
                <p><span class="glyphicon glyphicon-earphone"></span>電話番号：{{ $hospital->tel}}</p>
                <p><span class="glyphicon glyphicon-time"></span>診察時間：{{ $hospital->opening_hour}}</p>
                <p><span class="glyphicon glyphicon-remove-sign"></span>休診日：{{ $hospital->closing_hour}}</p>
                <p><span class="glyphicon glyphicon-apple"></span>診察できる動物の種類：
                    @foreach($hospital->animal_ids as $id)
                        {{ $id->animal . '　'}}
                    @endforeach</p>
            
            </div>
        </div> 
    </div> 
    @if(Auth::check())
        {!! link_to_route('reviews.create','口コミを投稿する',['id'=>$hospital->id],['class' => 'btn btn-primary'])!!}
    @endif
     
    @if(isset(Auth::user()->admin_flag))
            {!! Form::open(['route' => ['hospitals.destroy', $hospital->id], 'method' => 'delete']) !!}
                {!! Form::submit('病院を削除する', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            {!! link_to_route('hospitals.edit','病院の情報を編集する',['id'=>$hospital->id],['class' => 'btn btn-info'])!!}
    @endif
    {!!link_to_route('hospitals.index','病院一覧へ戻る',null,['class' => 'btn btn-link'])!!}
    <div>
         <h2>{{ $hospital->name }}の口コミ一覧</h2>
        @foreach($reviews as $review)
            @if(isset($review))
               
                
                 <div class="panel panel-info">
                     <div class="panel-heading">
                        <p class="panel-title">{{ $review->title }}</p>
                        
                    </div>
                    <div class="panel-body">
                        <p><span class="glyphicon glyphicon-pencil">口コミの内容</p>
                        <p>{{ $review->content }}</p>
                        <p><span class="glyphicon glyphicon-search">診察領域：{{ $review->subject['subject'] }}</p>
                        <p><span class="glyphicon glyphicon-apple"></span>ペットの種類：{{ $review->animal['animal'] }}</p>
                        <p><span class="glyphicon glyphicon glyphicon-star">5段階評価：{{ $review->value }}点</p>
                    </div>
                </div>
               
            @elseif(! isset($review))
                <p>口コミはまだありません</p>
            @endif
         @endforeach
    </div>
    {!! $reviews->render() !!}
</div>
@endsection