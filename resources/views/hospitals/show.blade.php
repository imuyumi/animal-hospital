@extends('layouts.app')
@section('content')

<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h2 class="panel-title">{{ $hospital->name }}</h2>
        </div>
        <div class="panel-body hospital-detail">
            <p>住所：{{ $hospital->prefecture['prefecture']}}{{ $hospital->address}}</p>
            <p>電話番号：{{ $hospital->tel}}</p>
            <p>診察時間：{{ $hospital->opening_hour}}</p>
            <p>休診日：{{ $hospital->closing_hour}}</p>
            <p>診察できる動物の種類：
                @foreach($hospital->animal_ids as $id)
                    {{ $id->animal . '/'}}
                @endforeach
            <div class="hospital-img">
                @if(isset($hospital->image_name))
                    <a><img src="{{ secure_asset("images/$hospital->image_name") }}" alt="{{ $hospital->image_name }}"></a>
                @else
                    <a><img src="{{ secure_asset("images/default.jpg") }}" alt="no-img"></a>
                @endif
            </div>
            <div>
                @if(Auth::check())
                {!! link_to_route('reviews.create','口コミを投稿する',['id'=>$hospital->id],['class' => 'col-md-4 btn btn-primary'])!!}
            </div>
                
        </div> 
        <div class="col-md-12">
        {!!link_to_route('hospitals.index','病院一覧へ戻る',null,['class' => 'col-md-8 btn btn-link'])!!}
        </div>
    </div>
   
        <div>
            @if(Auth::user()->admin_flag)
                {!! Form::open(['route' => ['hospitals.destroy', $hospital->id], 'method' => 'delete']) !!}
                    {!! Form::submit('病院を削除する', ['class' => 'col-md-5 btn btn-danger']) !!}
                {!! Form::close() !!}
                {!! link_to_route('hospitals.edit','病院の情報を編集する',['id'=>$hospital->id],['class' => 'col-md-5  col-md-offset-2 btn btn-info'])!!}
            @else
            @endif
        </div>
    @endif
     <h1>{{ $hospital->name }}の口コミ一覧</h1>
    <div>
        <div>
            @if(isset($reviews))
                @foreach($reviews as $review)
                 <div class="panel panel-info">
                     <div class="panel-heading">
                        <p class="panel-title">{{ $review->title }}</p>
                        <p>診察領域：{{ $review->subject['subject'] }}/ペットの種類：{{ $review->animal['animal'] }}/5段階評価：{{ $review->value }}</p>
                    </div>
                    <div class="panel-body">
                        <p>口コミの内容</p>
                        <p>{{ $review->content }}</p>
                    
                    </div>
                </div>
                @endforeach
            @else
                <p>口コミはまだありません</p>
            @endif
        </div>
        {!! $reviews->render() !!}
    </div>
</div>
@endsection