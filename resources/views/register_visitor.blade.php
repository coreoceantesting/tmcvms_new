@extends('layouts.master')

@section('content')

<div class="container-fluid">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{Session::get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    {{Session::get('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header text-white bg-primary">{{ __('Visitor Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('visitor.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Visitor Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Visitor Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="organization" class="col-md-4 col-form-label text-md-right">{{ __('Organization') }}</label>

                            <div class="col-md-6">
                                <input id="organization" type="text" class="form-control @error('organization') is-invalid @enderror" name="organization" value="{{ old('organization') }}" required autocomplete="organization">

                                @error('organization')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="purpose_of_visit" class="col-md-4 col-form-label text-md-right">{{ __('Purpose Of Visit') }}</label>

                            <div class="col-md-6">
                                <select name="purpose_of_visit" id="purpose_of_visit" class="form-control @error('purpose_of_visit') is-invalid @enderror" required autocomplete="purpose_of_visit">
                                    <option value="">Select purpose of visit</option>
                                    @foreach($VisitingPurpose as $visit)
                                        <option value="{{$visit->name}}">{{$visit->name}}</option>
                                    @endforeach
                                </select>

                                @error('purpose_of_visit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="visiting_dept" class="col-md-4 col-form-label text-md-right">{{ __('Visiting Department') }}</label>

                            <div class="col-md-6">
                                <select name="visiting_dept" id="visiting_dept" class="form-control @error('visiting_dept') is-invalid @enderror" required autocomplete="visiting_dept">
                                    <option value="">Select Visiting Department</option>
                                    @foreach($department as $dept)
                                        <option value="{{$dept->name}}">{{$dept->name}}</option>
                                    @endforeach
                                </select>

                                @error('visiting_dept')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="to_visit" class="col-md-4 col-form-label text-md-right">{{ __('To Visit') }}</label>

                            <div class="col-md-6">
                                <input id="to_visit" type="text" class="form-control @error('to_visit') is-invalid @enderror" name="to_visit" value="{{ old('to_visit') }}" required autocomplete="to_visit">

                                @error('to_visit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pass_id" class="col-md-4 col-form-label text-md-right">{{ __('Pass Id') }}</label>

                            <div class="col-md-6">
                                <input id="pass_id" type="text" class="form-control @error('pass_id') is-invalid @enderror" name="pass_id" value="{{ old('pass_id') }}" required>

                                @error('pass_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                                <a href="{{route('entrylist.visitor')}}" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection