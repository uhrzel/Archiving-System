@extends('layouts.app')

@section('title', 'Edit Student Data')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Students</h1>
        </div>
        <form action="{{ route('students.update', $admin->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $admin->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $admin->email }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </section>
</div>
@endsection