@extends('support-tickety::layouts.app')
@section('title','Support Category List')

@section('content')


    <div class="app-content main-content">
        <div class="side-app main-container">

            <!--Page header-->
            <div class="page-header d-lg-flex d-block">
                <div class="page-leftheader">
                    <div class="page-title"> Support Category List</div>
                </div>
                <div class="page-rightheader ms-md-auto">
                    <div class=" btn-list">

                        <a href="{{ route('ticket-categories.create') }}"  class="btn btn-primary">
                            <i class="fa fa-plus"></i> Add Support Category
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
                                        <div class="col-lg-12">
                                            <table class="table table-striped" id="dataTable">

                                                <tbody>
                                                <tr>
                                                    <th> #SL</th>
                                                    <th> Name</th>
                                                    <th> Action</th>
                                                </tr>
                                                @foreach($supportCategory as $key=>$value)
                                                    <tr>
                                                        <td> {{ $key+1 }} </td>
                                                        <td> {{ $value->name }} </td>
                                                        <td>
                                                            <a href="{{ route('support-categories.edit', $value->id) }}"
                                                               class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Edit</a>
                                                            <form action="{{ route('support-categories.destroy', $value->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-md-12 text-right">
                                            {{ $supportCategory->links() }}
                                        </div>
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



