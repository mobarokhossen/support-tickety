@extends('layouts.skeleton')
@section('title', 'Ticket: '.$ticket->token)

@push('styles')
    <link href="{{ asset('assets/css/mehedi.css') }}" rel="stylesheet"/>
    <style>
        .row {
            margin: 0;
        }

        .richText {
            position: relative;
            width: 235%;
        }

        a:not([href]):not([tabindex]) {
            color: inherit;
            text-decoration: none;
            display: none;
        }

        .btn-group.btn-group-toggle .btn {
            border-color: white;
        }

        .btn-group.btn-group-toggle .btn.active {
            border-color: white !important;
            background-color: #3e8ef7 !important;
            color: white !important;
        }

        .send-to > * + * {
            margin-left: 20px;
        }

        element.style {
        }

        .send-to > * + * {
            margin-left: 20px;
        }

        .abc-checkbox {
            cursor: default;
            padding-left: 4px;
        }

        .abc-checkbox label {
            cursor: pointer;
            display: inline;
            vertical-align: top;
            position: relative;
            padding-left: 15px;
        }

        .abc-checkbox label {
            padding-left: 10px;
            padding-top: 8px;
            margin-right: 8px;
        }

        .abc-checkbox.abc-checkbox-circle label::before {
            border-radius: 50%;
        }

        .abc-checkbox label::after,
        .abc-checkbox label::before {
            width: 30px;
            height: 30px;
            font-size: 18px;
            padding-left: 6px;
        }

        input#sendSms {
            opacity: 0;
        }

        .sms-content-container {
            position: relative;
            width: 237%;
        }

        .abc-checkbox label::before {
            cursor: pointer;
            content: "";
            display: inline-block;
            position: absolute;
            width: 17px;
            height: 17px;
            top: 2px;
            left: 10px;
            margin-left: -1.25rem;
            border: 1px solid #ced4da;
            border-radius: 3px;
            background-color: #fff;
            transition: border .15s ease-in-out, color .15s ease-in-out;
        }

        .abc-checkbox input[type="checkbox"] + label::after {
            color: rgb(211, 211, 211);
            font-family: "Font Awesome 5 Pro", serif;
            content: "✔";
        }

        .abc-checkbox label::after,
        .abc-checkbox label::before {
            width: 30px;
            height: 30px;
            font-size: 18px;
            padding-left: 6px;
        }

        .abc-checkbox label::after {
            cursor: pointer;
            display: inline-block;
            position: absolute;
            width: 16px;
            height: 16px;
            left: 15px;
            top: 3px;
            margin-left: -1.3rem;
            padding-left: 3px;
            padding-top: 1px;
            font-size: 18px;
            color: #495057;
        }

        .abc-checkbox input[type=checkbox]:checked + label::after {
            color: #fff;
        }

        .abc-checkbox-success input[type=checkbox]:checked + label::before,
        .abc-checkbox-success input[type=radio]:checked + label::before {
            background-color: #28a745;
            border-color: #28a745;
        }

        label.form-control-label.required:after {
            content: '*';
            color: red;
            margin-left: 3px;
        }

        @media only screen and (max-width: 600px) {

            .text-left {
                text-align: left !important;
            }


        }

    </style>
@endpush
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

