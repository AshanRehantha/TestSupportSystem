@extends('layouts.admin')

@section('content')
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">{{ __('backend.cus_tick_view') }}</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="xtreme-table" class="display table" style="width: 100%; cellspacing: 0;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('backend.name') }}</th>
                                    <th>{{ __('backend.email') }}</th>
                                    <th>{{ __('backend.contact_number') }}</th>
                                    <th>{{ __('backend.pro_discription') }}</th>
                                    <th>{{ __('backend.status') }}</th>
                                    <th>{{ __('backend.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $ticket_data)
                                        <tr>
                                            <td>{{$ticket_data->id}}</td>
                                            <td>{{$ticket_data->name}}</td>
                                            <td>{{$ticket_data->email}}</td>
                                            <td>{{$ticket_data->contact_number}}</td>
                                            <td>{{$ticket_data->pro_discription}}</td>
                                            <td>@if($ticket_data->status === 1) <span class="badge bg-success">Open</span> @else <span class="badge bg-danger">Closed</span> @endif</td>
                                            <td>
                                                <a class="btn btn-primary btn-xs" href="{{ route('ticket.admin.reply', [$ticket_data->ticket_id])}}"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Reply Ticket"></i></a>
                                                <a class="btn btn-warning btn-xs"><i class="fa fa-wrench" data-toggle="tooltip" data-placement="top" title="Add to Repair"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
