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
                        <form action="" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="thesis_course">Course</label>
                                    <input type="text" class="form-control" id="thesis_course" name="thesis_course" required>
                                </div>
                                <div class="form-group">
                                    <label for="thesis_title">Title</label>
                                    <textarea class="form-control" id="thesis_title" name="thesis_title" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="thesis_description">Description</label>
                                    <textarea class="form-control" id="thesis_description" name="thesis_description" required></textarea>
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

            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Course</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

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