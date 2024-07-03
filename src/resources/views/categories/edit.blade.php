@extends('support-tickety::layouts.app')
@section('title','Edit Ticket Category')

@section('content')

    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title">Edit Ticket Category</div>
                </div>
                <div class="page-rightheader ms-md-auto">
                    <div class=" btn-list">

                        <a href="{{ route('business_admin.categories.index') }}" class="btn btn-primary">
                            <i class="fa fa-arrow-left"></i> Go Back
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
                                    <div class="col-12 col-md-6">
                                        <form
                                            action="{{ route('business_admin.ticket-categories.update', $ticketCategory->id) }}"
                                            method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                                            @method('PUT')
                                            @csrf

                                            <div class="form-group">
                                                <label for="companyName">Ticket Category Name <span class="text-danger">*</span>
                                                </label>
                                                <input type="text"  class="form-control"
                                                       name="name"
                                                       value="{{ $ticketCategory->name }}" required/>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
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


@section('scripts')

    <script src="{{ asset('assets/plugins/fileupload/js/dropify.js') }}"></script>

    <script>

        $('.dropify').dropify();
    </script>

@endsection
