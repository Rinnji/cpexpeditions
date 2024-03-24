@extends('layouts.main_layout')
@section('content')
<div class="flex justify-center flex-col items-center">
  <div class="flex">
    <div class="">
      <h1>Users</h1>
      <table class="shadow [&_td]:px-4 [&_td]:border-2">
        <thead>
          <tr>
            <th>ID</th>
            <th>Names</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->get_fullname() }}</td>
            <td>{{ $user->email }}</td>
            <td>{{date("F j, Y", strtotime($user->created_at)) }}</td>
            <td>@if($user->is_admin)
              Admin
              @else
              User
              @endif
            </td>
            <td>
              <button class="p-2 bg-green-500">Set Admin</button>
              <button class="p-2 bg-red-500">Remove Admin</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection('content')