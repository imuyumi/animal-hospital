@extends('layouts.app')
@section('content')
    @foreach($results as $result)
    <ul>
       <li>{!! link_to_route('hospitals.show', $result->name, ['id'=> $result->hospital_id] )!!}</li>
    </ul>
   @endforeach
@endsection