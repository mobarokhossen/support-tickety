@extends('support-tickety::layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center my-4">
                    <h1>Add Ticket Category</h1>
                    <a href="{{ route('business_admin.ticket-categories.index') }}" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Go Back
                    </a>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('business_admin.ticket-categories.store') }}" class="needs-validation" novalidate method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Ticket Category Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                                <div class="invalid-feedback">
                                    Please provide a name.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Ticket Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


