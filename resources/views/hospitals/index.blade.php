@extends('layouts.app')
@section('content')
    @foreach($hospitals as $hospital)
    <ul>
       <li>{!! link_to_route('hospitals.show', $hospital->name, ['id'=> $hospital->id] )!!}</li>
    </ul>
   @endforeach
@endsection