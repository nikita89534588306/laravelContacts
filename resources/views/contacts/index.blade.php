@extends('templates.main')

@section('content')
<div class="mt-5">
  <a href="{{route('create_contact')}}" class="btn btn-success mb-2">Создать контакт</a>
  <table class="table table-secondary table-striped  text-center">
    <thead class="table-dark ">
      <tr>
        <th scope="col">Имя</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Телефон</th>
      </tr>
    </thead>
    <tbody>
      
        @foreach($dataAllUsers as $thisUser)
          <tr>
            <td>{{$thisUser->name}}</td>
            <td>{{$thisUser->surname}}</td>
            <td>{{$thisUser->phone_number}}</td>
          </tr>
        @endforeach

    </tbody>
  </table>
</div>
@endsection