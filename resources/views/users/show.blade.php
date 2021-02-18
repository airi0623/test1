@extends('layouts.app')
@section('content')

<div class="container">
  <div class="justify-content-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        MY PAGE
      </div>
      <div class="card-body">
        <table class="table">
          <tr class="row">
            <th class="col-4">ID</th>
            <td class="col-6">{{ $user->id }}</td>
          </tr>
          <tr class="row">
            <th class="col-4">icon</th>
            <td class="col-6">
              <div class="box-img">
                <img src="{{Storage::url($user->image)}}" alt="画像だよ" class="img-icon">
                {{-- <!-- <img src="../storage/image/{{$user->image}}" alt="画像だよ" class="img-icon"> --> --}}
                {{-- <!-- <img src="/storage/{{$user->image}}" alt="画像だよ" class="img-icon"> -->--}}
              </div>
            </td>
          </tr>
          <tr class="row">
            <th class="col-4">name</th>
            <td class="col-6">{{ $user->name }}</td>
          </tr>
          <tr class="row">
            <th class="col-4">Profile</th>
            <td class="col-6">{{ $user->profile }}</td>
          </tr>
          <tr class="row">
            <th class="col-4">Email</th>
            <td class="col-6">{{ $user->email }}</td>
          </tr>
        </table>
      </div>
    </div>
    </div>
  </div>
</div>
@endsection