@extends('support-tickety::layouts.app')
@section('title','Tickets List')

@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title"> Tickets List</div>
                </div>
                <div class="page-rightheader ms-md-auto">
                    <div class=" btn-list">

                        <a href="{{ route('business_admin.tickets.create') }}"  class="btn btn-primary">
                            <i class="fa fa-plus"></i> Create Ticket
                        </a>

                    </div>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row flex-lg-nowrap">
                <div class="col-12">
                    <div class="row flex-lg-nowrap">
                        <div class="col-12 mb-3">
                            <div class="e-panel card">
                                <div class="card-body">
                                    <div class="table-responsive">

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>

    </div><!-- end app-content-->


@endsection




