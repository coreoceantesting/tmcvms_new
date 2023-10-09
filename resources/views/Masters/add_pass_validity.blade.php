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
                <div class="card-header text-white bg-primary align-items-center d-flex" style="justify-content: space-between;"><strong>Add Pass Validity</strong></div>
                <div class="card-body">
                    <form action="{{ route('store.pass_validity') }}" method="POST">
                        @csrf
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="Name"><strong>Name</strong></label>
                            <input type="text" style="border: solid 1px" class="form-control" placeholder="Name" name="name" id="name" required>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="number"><strong>Validity (In no of days)</strong></label>
                            <input type="number" style="border: solid 1px" class="form-control" placeholder="No of days" name="no_of_days" id="no_of_days" required>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection