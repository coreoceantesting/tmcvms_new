@extends('layouts.master') <!-- If you have a layout file -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('404 Not Found') }}</div>

                <div class="card-body">
                    {{ __('The page you are looking for does not exist.') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
