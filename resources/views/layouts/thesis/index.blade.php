@extends('layouts.app')

@section('title', 'Thesis Page')

@push('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('content')
<style>
    /* Add this */
    .modal-backdrop {
        /* Bug fix - no overlay */
        display: none;
    }
</style>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Thesis Page</h1>
        </div>

        <div class="section-body">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="section-title mb-3">Thesis List</h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addThesisModal">
                    Add New Thesis
                </button>
            </div>

            <!-- Add Thesis Modal -->
            <div class="modal fade" id="addThesisModal" tabindex="-1" role="dialog" aria-labelledby="addThesisModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addThesisModalLabel">Add New Thesis</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('thesis.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="thesis_title">Title</label>
                                    <textarea class="form-control" id="thesis_title" name="thesis_title" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="thesis_file">Thesis File</label>
                                    <input type="file" class="form-control" id="thesis_file" name="thesis_file" required>
                                </div>
                                <div class="form-group">
                                    <label for="thesis_course">Course</label>
                                    <select class="form-control" id="thesis_course" name="thesis_course" required>
                                        <option value="" disabled selected>Select Course</option>
                                        @foreach($courses as $course)
                                        <option value="{{ $course->course_name }}">{{ $course->course_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="abstract">Abstract</label>
                                    <textarea class="form-control" id="abstract" name="abstract" required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Thesis</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: "{{ session('success') }}",
                        confirmButtonText: 'Okay'
                    });
                });
            </script>
            @endif
            @if($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "{{ $errors->first() }}",
                        confirmButtonText: 'Okay'
                    });
                });
            </script>
            @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thesis Title</th>
                            <th>Thesis Course</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($thesis as $thesis_data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $thesis_data->thesis_title }}</td>
                            <td>{{ ucfirst($thesis_data->thesis_course) }}</td>
                            <td>
                                <div style="display: flex; gap: 10px;">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editThesisModal{{$thesis_data->id}}" style="width: 120px;">
                                        Edit Thesis
                                    </button>
                                    <form action="{{ route('thesis.destroy', $thesis_data->id) }}" method="POST" class="delete-thesis-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" style="width: 120px;" onclick="confirmDelete(this)">Delete</button>
                                    </form>

                                </div>
                            </td>
                            <div class="modal fade" id="editThesisModal{{$thesis_data->id}}" tabindex="-1" role="dialog" aria-labelledby="editThesisModalLabel{{$thesis_data->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editThesisModalLabel{{$thesis_data->id}}">Edit Thesis</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('thesis.update', $thesis_data->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="edit_thesis_title">Thesis Title</label>
                                                    <input type="text" class="form-control" id="edit_thesis_title" name="edit_thesis_title" value="{{ $thesis_data->thesis_title }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_thesis_file">Thesis File</label>
                                                    <input type="file" class="form-control" id="edit_thesis_file" name="edit_thesis_file">
                                                </div>

                                                <div class="form-group">
                                                    <label for="edit_thesis_course">Thesis Course</label>
                                                    <select class="form-control" id="edit_thesis_course" name="edit_thesis_course" required>
                                                        <option value="" disabled>Select Course</option>
                                                        @foreach($courses as $course)
                                                        <option value="{{ $course->course_name }}"
                                                            {{ $course->course_name == $thesis_data->thesis_course ? 'selected' : '' }}>
                                                            {{ $course->course_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_thesis_abstract">Thesis Abstract</label>
                                                    <input type="text" class="form-control" id="edit_thesis_abstract" name="edit_thesis_abstract" value="{{ $thesis_data->abstract}}" required>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update Course</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(button) {
        const form = button.closest('.delete-thesis-form'); // Get the form element
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submit the form if confirmed
            }
        });
    }
</script>
@endpush