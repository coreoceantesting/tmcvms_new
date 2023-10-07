@extends('layouts.master')

<style>
    .card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 0.75rem!important;
}
ul {
    list-style: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
}
</style>
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-header text-white bg-primary align-items-center d-flex" style="justify-content: space-between;"><strong>Register Users</strong></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store.users') }}">
                        @csrf
                        <div class="form-group">
                            <input id="first_name" type="text" class="form-control form-control-user @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="Enter First Name" autofocus>

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="last_name" type="text" class="form-control form-control-user @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Enter Last Name" autofocus>

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="mobileno" type="number" class="form-control form-control-user @error('mobileno') is-invalid @enderror" name="mobileno" value="{{ old('mobileno') }}" required autocomplete="mobileno" placeholder="Enter Mobile Number" autofocus>

                            @error('mobileno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address.">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <select id="gender" name="gender" class="form-control">
                                <option value="">Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                {{-- <option value="Others">Others</option> --}}
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="empid" type="text" class="form-control form-control-user @error('empid') is-invalid @enderror" name="empid" value="{{ old('empid') }}" required autocomplete="empid" autofocus placeholder="Enter Employee Id">

                                @error('empid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <input id="username" type="text" class="form-control form-control-user @error('username') is-invalid @enderror" name="username" required autocomplete="username" placeholder="Enter Username">

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Confirm password">
                        </div>

                        <div class="form-group">
                            <select id="role" name="role" class="form-control">
                                <option value="">Select User Type</option>
                                <option value="staff">Staff</option>
                                <option value="hod">Head of Department (HOD)</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group department" id="department" style="display: none">
                            <select id="dept" name="dept" class="form-control">
                                <option value="">Select Department</option>
                                @foreach($department as $dept)
                                    <option value="{{$dept->name}}">{{$dept->name}}</option>
                                @endforeach
                            </select>
                            @error('dept')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <button class="btn btn-primary btn-user btn-block">Register</button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{route('list.users')}}" class="btn btn-secondary btn-user btn-block">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const userRoleSelect = document.getElementById('role');
        const departmentSection = document.getElementById('department');

        userRoleSelect.addEventListener('change', function () {
            if (userRoleSelect.value === 'hod') {
                // Show the department dropdown section for the 'hod' role
                departmentSection.style.display = 'block';
            } else {
                // Hide the department dropdown section for other roles
                departmentSection.style.display = 'none';
            }
        });
    </script>

</div>

@endsection