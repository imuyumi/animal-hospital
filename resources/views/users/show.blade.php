@extends('layouts.app')
@section('content')
    <div>
        <ul>
            <li>{{ $user->name}}</li>
            <li>{{ $user->email}}</li>
        </ul>
        @if ($user->admin_flag)
            {{link_to_route('hospitals.create','病院を登録する')}}
        @else
            {{-- @yield(xxxx)　自分が投稿したreviewsを一覧表示--}}
        @endif
    </div>
@endsection