@extends('dashboard')

@section('content')
<div class="container">
    <h1>Create Expense Category</h1>
    <form action="{{ route('admin.expense_categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
