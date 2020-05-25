@extends('layouts.app')

@section('content')
<title>Home</title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p><a href="/ledgers">View Ledger Record</a></p>
                    @if(Auth::User()->is_admin==1)
                    <p><a href="/usermanage">User Management</a></p>
                    @else
                    <p><a href="/profilesetting">Profile Setting</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
