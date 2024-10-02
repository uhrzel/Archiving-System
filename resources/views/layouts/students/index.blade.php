@extends('layouts.app')

@section('title', 'Access Data')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List of Students</h1>
        </div>

        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="section-body">
            <div class="table-responsive">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <form action="{{ route('students.index') }}" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Search By ID...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" style="margin-left:5px;" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->student_id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>
                                <span style="
        @if($item->status == 'pending')
            background-color: orange;
        @elseif($item->status == 'approved')
            background-color: green; color: white;
        @elseif($item->status == 'banned')
            background-color: red; color: white;
        @endif
        padding: 2px 5px; border-radius: 3px;">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td>
                                <a class="btn btn-success view" href="#" onclick="showModal({{ $item->id }})">View</a>
                                <a href="{{ route('students.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('students.delete', $item->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="studentsModal" tabindex="-1" aria-labelledby="studentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentsModalLabel">Students Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="studentsDetailsContent">
                    <!-- Students details will be displayed here -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function showModal(id) {
        $.ajax({
            url: '/students/' + id,
            method: 'GET',
            success: function(data) {

                let statusClass = '';
                switch (data.status) {
                    case 'pending':
                        statusClass = 'text-bg-warning';
                        break;
                    case 'approved':
                        statusClass = 'text-bg-success';
                        break;
                    case 'banned':
                        statusClass = 'text-bg-danger';
                        break;
                    default:
                        statusClass = 'text-bg-secondary';
                }

                $('#studentsDetailsContent').html(`
                <div class="mb-3">
                    <h6 class="font-weight-bold">Student ID:</h6>
                    <p>${data.student_id}</p>
                </div>
                <div class="mb-3">
                    <h6 class="font-weight-bold">Student Name:</h6>
                    <p>${data.name || 'Unknown'}</p>
                </div>
                <div class="mb-3">
                    <h6 class="font-weight-bold">Email:</h6>
                    <p>${data.email}</p>
                </div>
                <div class="mb-3">
                    <h6 class="font-weight-bold">Status:</h6>
                <span class="${statusClass} px-2 py-1 rounded"> ${data.status}</span>
                </div>
                <div class="mb-3">
                    <h6 class="font-weight-bold">Ceo File:</h6>
              <img src="${data.coe_file_path}" style="width: 50%; height: 300px;" class="border border-gray-300 rounded-lg" />
          
                </div>
              
            `);
                $('#studentsModal').modal('show'); // Show the modal
            },
            error: function() {
                alert('Error fetching students details.');
            }
        });
    }
</script>
@endpush