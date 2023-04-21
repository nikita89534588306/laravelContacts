@extends('templates.main')

@section('content')
    <h1 class="mt-5">{{$dataUser->name}} {{$dataUser->surname}}</h1>
    <div>{{$dataUser->phone_number}}</div>
    <a href="{{route('all_contacts')}}" class="btn btn-success mt-2">На главную</a>
@endsection