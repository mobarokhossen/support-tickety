@extends('support-tickety::layouts.app')
@section('title', 'New tickets')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1>Create a New Ticket</h1>
                <form method="post" enctype="multipart/form-data" action="{{ route('business_admin.tickets.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Ticket Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="ticket_category_id" class="form-label">Category</label>
                        <select name="ticket_category_id" id="ticket_category_id" class="form-select" required>
                            <option value="" disabled selected>Choose one</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3"
                                  required>{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="attachment" class="form-label">Attachment</label>
                        <input type="file" name="attachment" id="attachment" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select name="priority" id="priority" class="form-select">
                            <option value="" disabled selected>Choose one</option>
                            @foreach(\App\Models\SupportTicket::PRIORITY_OPTIONS as $key => $value)
                                <option value="{{ $key }}" {{ $key == old('priority') ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
```

By following these steps, you can set up and use your vendor view files in a Laravel application.