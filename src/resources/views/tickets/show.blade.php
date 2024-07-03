@extends('support-tickety::layouts.app')
@section('title', 'Ticket: '.$ticket->token)

@section('content')

    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Ticket: {{ $ticket->token }}</div>
                </div>
                <div class="page-rightheader ms-md-auto">
                </div>
            </div>

                <div class="panel panel-bordered card ">
                    <div class="card-body pt-5 mt-5">


                        <div style="max-width: 800px">


                            <div class="form-group mb-4 row">
                                <label for="title" class="col-md-4 form-control-label text-left">Ticket
                                    title</label>
                                <div class="col-md-8 ">
                                    <b> {{ $ticket->title }} </b>
                                </div>
                            </div>

                            <div class=" form-group mb-4 row">
                                <label class="col-md-4 form-control-label text-left" for="expense_category">Category  </label>
                                <div  class="col-md-8">
                                        {{ $ticket->category->name }}
                                </div>

                            </div>

                            <div class="form-group mb-4 row ">
                                <label for="tickets-date" class="col-md-4 form-control-label text-left">
                                    Description</label>
                                <div class="col-md-8">
                                    {{ $ticket->description }}
                                </div>
                            </div>
                            <div class="form-group mb-4 row ">
                                <label for="attachment" class="col-md-4 form-control-label text-left">
                                    Attachment
                                </label>
                                <div class="form-control-input  col-md-8 ">
                                    @if($ticket->ImagePath)
                                        <a href="{{ $ticket->ImagePath }}" target="_blank">
                                            <img src="{{$ticket->ImagePath}}" width="200px" />
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class=" form-group mb-4 row">
                                <label class="col-md-4 form-control-label text-left" for="expense_category">Priority  </label>
                                <div  class="col-md-8">
                                    {{ $ticket->priorityValue($ticket->priority) }}
                                </div>
                            </div>

                            <div class=" form-group mb-4 row">
                                <label class="col-md-4 form-control-label text-left" for="expense_category">Status  </label>
                                <div  class="col-md-8">
                                    {{ $ticket->statusValue($ticket->status) }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
        </div>
    </div><!-- end app-content-->

@endsection

