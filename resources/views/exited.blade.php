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
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card">
                <div class="card-header text-white bg-primary align-items-center d-flex" style="justify-content: space-between;"><strong>Exited Visitor List</strong></div>
                <div class="card-body">
                    <form action="{{ route('exitedlist.visitor') }}" method="GET">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="Name"><strong>Name</strong></label>
                            <input type="text" style="border: solid 1px" class="form-control" placeholder="Name" name="name" id="name" value="{{ request('name') }}">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="mobnumber"><strong>Mobile Number</strong></label>
                            <input type="number" style="border: solid 1px" class="form-control" name="mobnumber" id="mobnumber" placeholder="Mobile Number" value="{{ request('mobnumber') }}">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="Department"><strong>Department</strong></label>
                              <select class="form-control" name="dept" id="dept" style="border: solid 1px">
                                  <option value="">Select Visiting Department</option>
                                  @foreach($department as $dept)
                                        <option value="{{$dept->name}}" @if(request('dept') == $dept->name) selected @endif>{{$dept->name}}</option>
                                    @endforeach
                              </select>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="passid"> <strong>Pass Id</strong> </label>
                            <input type="text" style="border: solid 1px" class="form-control" name="passid" id="passid" placeholder="Enter Pass Id" value="{{ request('passid') }}">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-filter" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if(count($visitors) > 0)
            @foreach($visitors as $visitor)
                <div class="col-sm-6" style="padding: 10px;">
                    <div class="card border-primary mb-3">
                        <div class="card-header bg-primary border-primary"><strong class="text-white" style="font-size: x-large;">{{$visitor->name}}</strong></div>
                        <div class="card-body">
                            <ul>
                                <li><strong>Pass ID:</strong> {{$visitor->pass_id}}</li>
                                <li><strong>Mobile Number:</strong> {{$visitor->mobile}}</li>
                                <li><strong>Entry Date And Time:</strong> {{ \Carbon\Carbon::parse($visitor->entry_datetime)->format('d-m-Y h:i:s A')}}</li>
                                <li><strong>Exit Date And Time:</strong> {{ \Carbon\Carbon::parse($visitor->exit_datetime)->format('d-m-Y h:i:s A')}}</li>
                                <li><strong>Oragnization:</strong> {{$visitor->organization}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No Record Found</p>
        @endif
    </div>
</div>
@endsection
