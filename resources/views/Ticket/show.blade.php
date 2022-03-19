@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header bg-primary text-white">Submit Ticket Details @if($data->status === 1)<span class="badge badge-success">Open</span> @else <span class="badge badge-warning">Closed</span>  @endif</h5>
                <div class="card-body">
                        <div class="form-group">
                            <label>Ticket Id</label>
                            <input type="text" class="form-control" value={{$data->ticket_id}} readonly>
                        </div>
                        <div class="form-group">
                          <label>Customer Name</label>
                          <input type="text"  value={{$data->name}} class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label>Problem Description</label>
                            <textarea class="form-control" readonly rows="3"  placeholder={{$data->pro_discription}} required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value={{$data->email}}  readonly>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" class="form-control" value={{$data->contact_number}} readonly>
                        </div>
                </div>
            </div>
            <br/><br/>
            @if($data->status === 2)
            <div class="card">
                <h5 class="card-header bg-primary text-white">Reply Ticket Details</h5>
                <div class="card-body">
                    @foreach ($reply as $replys)
                        <div class="form-group">
                            <label>Agent Reply </label>  <label> by - {{$replys->reply_by}}</label>
                            <textarea class="form-control" readonly rows="3"  placeholder="{{$replys->reply_data}}" required></textarea>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
