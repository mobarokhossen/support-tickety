@extends('layouts.skeleton')
@section('title', 'New tickets')

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
                    <div class="page-title">New Ticket</div>
                </div>
                <div class="page-rightheader ms-md-auto">
                    {{-- <div class=" btn-list">
                        <a href="{{ route('business_admin.home') }}"> <button class="btn btn-primary" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="" data-bs-original-title="Go Back"> <i
                                    class="feather feather-arrow-left-circle"></i> Go Back </button></a>
                    </div> --}}
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <!-- <div class="row"> -->
            <form method="post" class="form-horizontal" enctype="multipart/form-data"
                  action="{{ route('business_admin.tickets.store') }}">

                <div class="panel panel-bordered card ">
                    <div class="card-body pt-5 mt-5">


                        <div style="max-width: 800px">


                            <div class="form-group mb-4 row">
                                <label for="title" class="col-md-4 form-control-label  required text-left">Ticket
                                    title</label>
                                <div class="col-md-8">
                                    <input required name="title" {{ old('title') }} id="title" type="text"
                                           class="form-control" value="">

                                </div>
                            </div>

                            <div class=" form-group mb-4 row">
                                <label class="col-md-4 form-control-label  required text-left" for="expense_category">Category  </label>
                                <div  class="col-md-8">
                                    <select name="ticket_category_id" id="category"  required
                                            data-placeholder="Choose One" class=" custom-select select2">
                                        <option label="Choose one"></option>
                                        @foreach($categories as $value)
                                            <option value="{{ $value->id }}"> {{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="form-group mb-4 row ">
                                <label for="tickets-date" class="col-md-4 form-control-label required text-left">
                                    Description</label>
                                <div class="col-md-8">
                                    <textarea class="content form-control"
                                              name="description"> {{ old('description') }}</textarea>
                                </div>
                            </div>


                            <div class="form-group mb-4 row ">
                                <label for="attachment" class="col-md-4 form-control-label text-left">
                                    Attachment
                                </label>
                                <div class="form-control-input  col-md-8 ">
                                    <input type="file" data-max-file-size="4M"
                                           accept=".jpg, .jpeg, .png" id="attachment"
                                           name="attachment"
                                           title="attachment" class="dropify" data-height="100"/>
                                </div>
                            </div>


                            <div class=" form-group mb-4 row">
                                <label class="col-md-4 form-control-label text-left" for="expense_category">Priority  </label>
                                <div  class="col-md-8">
                                    <select name="priority" id="priority"
                                            data-placeholder="Choose One" class=" custom-select">
                                        <option label="Choose one"></option>
                                        @foreach(\App\Models\Ticket::PRIORITY_OPTIONS as $key => $value)
                                            <option value="{{$key}}"  {{ $key == old('priority') ? "Selected" : '' }}  > {{ $value  }} </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


                            <div class="form-group mb-4 row ">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="ladda-button btn btn-primary w-200"
                                            data-app-plugin="ladda" data-style="expand-left"><span class="ladda-label">
                                            Submit Ticket
                                        </span><span class="ladda-spinner"></span></button>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row" > --}}


                    </div>


                    {{-- </div> --}}


                </div>
            </form>
        </div>
    </div><!-- end app-content-->

@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
            integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
        });
        $('.fc-datepicker1').datepicker({
            defaultDate: "today",
            dateFormat: "dd-mm-yy",
            minDate: "today",
            showOtherMonths: true,
            selectOtherMonths: true
        });

    </script>
@endpush
