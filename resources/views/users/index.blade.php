@extends('layouts.main_layout')
@section('content')
<div class="flex justify-center flex-col items-center">
  <div class="flex">
    <div class="">
      <h1 class="text-3xl font-bold mb-2">Users</h1>
      <table class="shadow [&_td]:px-4 [&_tr]:border-[1px]">
        <thead>
          <tr>
            <th>Status</th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>

            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>
              @if($user->is_admin == 1)
              <p title="Admin" class="flex items-center">
                <span class="material-symbols-outlined">
                  shield_person
                </span>
                Admin
              </p>
              @else
              <p title="User" class="flex items-center">
                <span class="material-symbols-outlined">
                  person
                </span>
                User
              </p>
              @endif

            </td>
            <td>{{ $user->id }}</td>
            <td>{{ $user->get_fullname() }}</td>
            <td>{{ $user->email }}</td>
            <td>{{date("F j, Y", strtotime($user->created_at)) }}</td>

            <td class="text-white flex gap-2">
              @if( $user->is_admin == 0)
              <form action="{{ route('users.update', $user->id) }}" method="POST">
                @method('PUT')
                @csrf

                <button class="bg-green-500 rounded shadow" title="Add admin privilages"><span class="p-1 material-symbols-outlined">
                    add
                  </span></button>
              </form>
              @else
              <form action="{{ route('users.update', $user->id) }}" method="post">
                @METHOD('PUT')
                @csrf
                <button class="bg-red-500 rounded shadow" title="Remove admin privilages"><span class="p-1 material-symbols-outlined">
                    remove
                  </span></button>
              </form>
              @endif
              <form action="{{ route('users.destroy', $user->id) }}" method="post">
                @METHOD('DELETE')
                @csrf
                <button class="bg-red-500 rounded shadow" title="Delete user"><span class="p-1 material-symbols-outlined">
                    delete
                  </span></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection('content')