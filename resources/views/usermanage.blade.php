@extends('layouts.app')
@section('content')
<title>User Management</title>

@if(Auth::User()->is_admin==1)
<!-- BUTTON TRIGGER -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ingoing">
  Add User
</button>
@endif
<!-- Modal -->
<div class="modal fade" id="ingoing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">First Name</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">Last Name</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
      </div>
    </div>
  </div>
</div>

<table class="table">
         <thead>
         <tr>
            <th>Date Created</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Account Type</th>
            @if(Auth::User()->is_admin==1)
            <th></th>
            @endif
         </tr>
         </thead>
         <tbody>
            @foreach($users as $user)
            <tr>
               <td>{{ $user->created_at }}</td>
               <td>{{ $user->fname }}</td>
               <td>{{ $user->lname }}</td>
               <td>{{ $user->email }}</td>
               <td>{{ $user->dob }}</td>
               @if($user->is_admin == 1)
                <td>Admin</td>
               @endif
               @if($user->is_admin == 0)
                <td>User</td>
               @endif
               @if(Auth::User()->is_admin==1)
               @if($user->is_admin == 1)
               @endif
               @if($user->is_admin == 0)
               <td><form action="/users/{{ $user->id }}" method="POST">
                @csrf
                    @method('DELETE')
                    <button>Delete User</button>
                    </form>
               </td>
               @endif
               @endif
            </tr>
            @endforeach
         </tbody>
      </table>
      {{ $users->links() }}
@endsection