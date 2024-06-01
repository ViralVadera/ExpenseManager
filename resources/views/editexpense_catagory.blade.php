@extends('dashboard')

@section('content')
<div class="container">
    <h1>Edit Expense Category</h1>
    <form action="{{ route('admin.expense_categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
