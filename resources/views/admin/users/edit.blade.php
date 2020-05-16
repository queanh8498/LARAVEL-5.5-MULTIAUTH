@extends('layouts.admin.master')

@section('content')
	<body class="">
    <div class="wrapper">
       @include('layouts.admin.sidenav')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <span class="navbar-brand">Manage User Data</span>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                   
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
   


                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6">
                           <div class="row">
                               <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header card-header-success">
                                            <h4 class="card-title">{{ $user->username }}</h4>
                                            <p class="card-category">Registered: {{ $user->created_at->diffForHumans(null, false, true) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('admin.user.update', $user->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="type" value="1">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">User Email</label>
                                                            <input type="text" class="form-control" disabled value="{{ $user->email}}">
                                                        </div>
                                                    </div>

                                                     <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }}">
                                                            <label class="bmd-label-floating">Username</label>
                                                            <input type="text" name="username" class="form-control" value="{{ $user->username}}">
                                                            @if ($errors->has('username'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('username') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button class="btn btn-success float-right" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                               </div>

                               <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header card-header-success">
                                            <h4 class="card-title">Passwords</h4>
                                            <p class="card-category">You can manage user passwords or force a password change here</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('admin.user.update', $user->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="type" value="2">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">New Password</label>
                                                            <input type="password" class="form-control" name="password">
                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                     <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Confirm Password</label>
                                                            <input type="password" name="password_confirmation" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button class="btn btn-success float-right" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                               </div>
                           </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>here</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                  
                </div>
            </div>
            @include('layouts.admin.footer')
        </div>
    </div>
</body>
@endsection