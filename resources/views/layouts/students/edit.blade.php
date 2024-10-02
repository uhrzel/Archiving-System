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
        <form action="{{ route('students.update', $admin->id) }}" method="POST" enctype="multipart/form-data"> <!-- Add enctype -->
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
            <!-- 
            <div class="form-group">
                <label for="coe_file">COE File</label>
                <input type="file" name="coe_file" id="coe_file" class="form-control">
                @if($admin->coe_file)
                <p>Current File: <a href="{{ asset('storage/' . $admin->coe_file) }}" target="_blank">View File</a></p>
                @endif
            </div> -->
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending" {{ $admin->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="approved" {{ $admin->status == 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="banned" {{ $admin->status == 'banned' ? 'selected' : '' }}>Banned</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </section>
</div>
@endsection