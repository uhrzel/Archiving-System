@extends('layouts.app')

@section('title', 'Courses Page')

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
            <h1>Courses Page</h1>
        </div>

        <div class="section-body">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="section-title mb-3">Course List</h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCourseModal">
                    Add New Course
                </button>
            </div>

            <!-- Add Course Modal -->
            <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addCourseModalLabel">Add New Course</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('courses.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="course_name">Course Name</label>
                                    <input type="text" class="form-control" id="course_name" name="course_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="course_description">Course Description</label>
                                    <textarea class="form-control" id="course_description" name="course_description" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="course_status">Course Status</label>
                                    <select class="form-control" id="course_status" name="course_status" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Course</button>
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

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Course Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->course_description }}</td>
                            <td>{{ ucfirst($course->course_status) }}</td>
                            <td>
                                <div style="display: flex; gap: 10px;">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editCourseModal{{$course->id}}" style="width: 120px;">
                                        Edit Course
                                    </button>
                                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="delete-course-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" style="width: 120px;" onclick="confirmDelete(this)">Delete</button>
                                    </form>
                                </div>
                            </td>

                            <div class="modal fade" id="editCourseModal{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="editCourseModalLabel{{$course->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editCourseModalLabel{{$course->id}}">Edit Course</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('courses.update', $course->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="edit_course_name">Course Name</label>
                                                    <input type="text" class="form-control" id="edit_course_name" name="edit_course_name" value="{{ $course->course_name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_course_description">Course Description</label>
                                                    <textarea class="form-control" id="edit_course_description" name="edit_course_description" required>{{ $course->course_description }}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_course_status">Course Status</label>
                                                    <select class="form-control" id="edit_course_status" name="edit_course_status" required>
                                                        <option value="active" {{ $course->course_status == 'active' ? 'selected' : '' }}>Active</option>
                                                        <option value="inactive" {{ $course->course_status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                    </select>
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
        const form = button.closest('.delete-course-form'); // Get the form element
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