@extends('layouts.app')
@section('content')
    @foreach($hospitals as $hospital)
       <h3>{!! link_to_route('hospitals.show', $hospital->name, ['id'=> $hospital->id] )!!}</h3>
   @endforeach
@endsection