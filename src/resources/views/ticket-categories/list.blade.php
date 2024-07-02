<?php
/**
 * Created by PhpStorm.
 * User: Mobarok-RC
 * Date: 5/9/2023
 * Time: 11:35 AM
 */

?>
@extends('layouts.skeleton')
@section('title','Ticket Category List')

@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title"> Ticket Category List</div>
                </div>
                <div class="page-rightheader ms-md-auto">
                    <div class=" btn-list">

                        <a href="{{ route('business_admin.ticket-categories.create') }}"  class="btn btn-primary">
                            <i class="fa fa-plus"></i> Add Ticket Category
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
                                        {!! $dataTable->table() !!}
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



