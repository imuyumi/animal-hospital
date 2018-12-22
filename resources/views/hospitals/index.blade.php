@extends('layouts.app')
@section('content')
<div class="col-md-6 col-md-offset-3">
    @foreach($hospitals as $hospital)
       <div class="panel panel-warning">
            <div class="panel-heading">
                <h2 class="panel-title">{{ $hospital->name }}</h2>
                <p>口コミが{{ $hospital->get_reviews($hospital->id)->count()}}件あります</p>
                {!! link_to_route('hospitals.show', '詳細を見る', ['id'=> $hospital->id ]) !!}
            </div>
            <div class="panel-body">
                <p>住所：{{ $hospital->prefecture['prefecture']}}{{ $hospital->address}}</p>
                <p>電話番号：{{ $hospital->tel}}</p>
                
                
            </div>
        </div>
   @endforeach
   {!! $hospitals->render() !!}
</div>

@endsection