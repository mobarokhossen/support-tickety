@extends('layouts.skeleton')
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
                  action="{{ route('business_admin.tickets.update', $ticket->id) }}">
                @method('PUT')
                @csrf

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
                                        @foreach($categories as $value)
                                            {{ $ticket->ticket_category_id == $value->id  ? $value->name  : '' }}
                                        @endforeach
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
                                    <select disabled id="priority"
                                            data-placeholder="Choose One" class=" custom-select">
                                        <option label="Choose one"></option>
                                        @foreach(\App\Models\Ticket::PRIORITY_OPTIONS as $key => $value)
                                            <option value="{{$key}}"  {{ $key == $ticket->priority ? "Selected" : '' }}  > {{ $value  }} </option>
                                        @endforeach

                                   </select>
                                </div>

                            </div>

                            <div class=" form-group mb-4 row">
                                <label class="col-md-4 form-control-label text-left" for="expense_category">Status  </label>
                                <div  class="col-md-8">
                                    <select disabled id="status"
                                            data-placeholder="Choose One" class=" custom-select">
                                        <option label="Choose one"></option>
                                        @foreach(\App\Models\Ticket::STATUS_OPTIONS as $key => $value)
                                            <option value="{{$key}}"  {{ $key == $ticket->status ? "Selected" : '' }}  > {{ $value  }} </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


                            <div class=" form-group mb-4 row">
                                <hr/>
                            </div>


                            <div class="form-group mb-4 row ">
                                <label for="tickets-date" class="col-md-4 form-control-label text-left">
                                   Reply Description</label>
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
                                <label class="col-md-4 form-control-label text-left" for="expense_category">Status  </label>
                                <div  class="col-md-8">
                                    <select name="status" id="status"
                                            data-placeholder="Choose One" class=" custom-select">
                                        <option label="Choose one"></option>
                                        @foreach(\App\Models\Ticket::STATUS_OPTIONS as $key => $value)
                                            <option value="{{$key}}"  {{ $key == "Pending" ? "Selected" : '' }}  > {{ $value  }} </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>


                            @if($ticket->status != "Solved")
                            <div class="form-group mb-4 row ">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="ladda-button btn btn-primary w-200"
                                            data-app-plugin="ladda" data-style="expand-left"><span class="ladda-label">
                                            Reply Ticket
                                        </span><span class="ladda-spinner"></span></button>
                                </div>
                            </div>
                                @endif
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
