@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-primary text-white">Submit New Ticket</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('ticket.store')}}">
                        @csrf
                        <div class="form-group">
                          <label>Customer Name <span class="requiredLable">*</span></label>
                          <input type="text" name="customer_name" class="form-control" placeholder="Customer Name" required>
                        </div>
                        <div class="form-group">
                            <label>Problem Description <span class="requiredLable">*</span></label>
                            <textarea class="form-control" name="customer_problem_discripction" rows="3" required placeholder="Problem Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Email <span class="requiredLable">*</span></label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number <span class="requiredLable">*</span></label>
                            <input type="number" class="form-control" name="phone_number" placeholder="Phone Number" required>
                        </div>
                        <label><span class="requiredLable">* All fields are mandatory</span></label>
                        <br/>
                            <button type="submit" class="btn btn-primary">Submit Ticket</button>
                            <button type="submit" class="btn btn-danger">Clear</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            @foreach ($errors->all() as $error)
            toastr.error("{{$error}}")
            @endforeach
        })
    </script>
@endsection
