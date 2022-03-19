@extends('layouts.admin')

@section('content')
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="col-md-6">
                        <div class="panel panel-white">
                            <div class="panel-heading clearfix">
                                <h4 class="panel-title">{{ __('backend.add_reply_ticket_view') }}</h4>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label" for="title">{{ __('backend.ticket_id') }}</label>
                                    <input type="text" class="form-control" value="{{$data->ticket_id}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">{{ __('backend.name') }}</label>
                                    <input type="text" class="form-control" value="{{$data->name}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ __('backend.email') }}</label>
                                    <input type="email" class="form-control" value="{{$data->email}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{ __('backend.contact_number') }}</label>
                                    <input type="email" class="form-control" value="{{$data->contact_number}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="title">{{ __('backend.pro_discription') }}</label>
                                    <textarea class="form-control" name="description" placeholder="{{$data->pro_discription}}" readonly></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-white">
                            <div class="panel-heading clearfix">
                                <h4 class="panel-title">{{ __('backend.add_reply_ticket_Table') }}</h4>
                            </div>
                            <div class="panel-body">
                                <form method="POST" action="{{ route('admin.ticket.reply')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label" for="title">{{ __('backend.admin.ticket.reply') }}</label>
                                        <input type="hidden" name="ticket_id" value="{{ $data->ticket_id }}"></input>
                                        <input type="hidden" name="user_email" value="{{ $data->email }}"></input>
                                        <input type="hidden" name="user_name" value="{{ $data->name }}"></input>
                                        <textarea class="form-control" name="description"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ __('backend.insert') }}</button>
                                    <button type="button" class="btn btn-danger">{{ __('backend.close') }}</button>
                                </form>
                            </div>
                        </div>
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
