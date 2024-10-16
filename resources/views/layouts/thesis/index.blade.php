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
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Thesis Title</th>
                            <th>Thesis Course</th>
                            <th>Thesis Status</th>
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
                                <span class="
        @if($thesis_data->status == 'pending') bg-warning
        @elseif($thesis_data->status == 'declined') bg-danger
        @elseif($thesis_data->status == 'published') bg-success
        @endif
        text-white px-2 py-1 rounded">
                                    {{ ucfirst($thesis_data->status) }}
                                </span>
                            </td>

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
<style>
    .swal2-html {
        color: white;
        /* White text color for contrast */
        padding: 15px;
        /* Padding for better spacing */
        border-radius: 5px;
        /* Rounded corners */
    }

    .swal-red {
        background-color: #dc3545;
        /* Red background color */
    }

    .swal-green {
        background-color: #28a745;
        /* Green background color */
    }
</style>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- @if(session('success'))
<script>
    const insightsText = `{{ session('insightsText', 'No significant similarity detected.') }}`;
    const thesisFilePath = `{{ session('thesisFilePath') }}`;
    const matchingTexts = @json(session('matchingTexts', []));
    let backgroundClass;
    let iconHtml;


    if (insightsText === "AI Content Detected.") {
        backgroundClass = 'swal-red';
        iconHtml = `<i class="fas fa-exclamation-triangle" style="color: orange;"></i> AI Content Detected.`;
    } else if (insightsText === "No AI Content Detected.") {
        backgroundClass = 'swal-green';
        iconHtml = `<i class="fas fa-check-circle" style="color: green;"></i> No AI Content Detected.`;
    } else {
        // Fallback case
        backgroundClass = 'swal-green'; // Default to green
        iconHtml = `<i class="fas fa-info-circle" style="color: blue;"></i> Information: ${insightsText}`;
    }
    let matchedTextHtml = '';
    if (matchingTexts.length > 0) {
        matchedTextHtml = `<div><strong>AI Content Found:</strong></div>`;
        matchedTextHtml += '<ul>';
        matchingTexts.forEach(text => {
            matchedTextHtml += `<li style="background-color: yellow;">${text}</li>`;
        });
        matchedTextHtml += '</ul>';
    }

    const sweetAlertContent = `
        <div>
            <span class="swal2-html ${backgroundClass}">${iconHtml}</span>
            <br><br>
            <iframe src="${thesisFilePath}" style="width: 100%; height: 300px; border: none;"></iframe>
            <br><br>
            ${matchedTextHtml}
        </div>
    `;

    // Display SweetAlert
    Swal.fire({
        title: 'Thesis Uploaded Successfully',
        html: sweetAlertContent,
        icon: 'success',
        confirmButtonText: 'OK',
        background: '#f8f9fa'
    });
</script>
@endif

@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'There was an error uploading your thesis.',
            confirmButtonText: 'OK',
            background: '#f8f9fa'
        });
    });
</script>
@endif -->

@if(session('success'))
<style>
    .animated-percentage {
        font-size: 24px;
        font-weight: bold;
        color: #4a4a4a;
        margin-top: 10px;
        text-align: center;
        animation: fadeIn 1s ease-in-out;
    }

    .percentage-bar {
        width: 100%;
        background-color: #e0e0e0;
        border-radius: 5px;
        overflow: hidden;
        margin-top: 10px;
    }

    .percentage-fill {
        height: 20px;
        background-color: #76c7c0;
        width: 0;
        /* Start with width 0, will be animated */
        border-radius: 5px;
        transition: width 1s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .swal2-html {
        font-size: 16px;
    }

    .matching-text {
        background-color: yellow;
        padding: 5px;
        border-radius: 3px;
        margin: 2px 0;
    }
</style>

<script>
    const insightsText = `{{ session('insightsText', 'No significant similarity detected.') }}`;
    const similarityDetails = `{{ session('similarityDetails') }}`;
    const thesisFilePath = `{{ session('thesisFilePath') }}`;
    const matchingTexts = @json(session('matchingTexts', []));

    let backgroundClass, iconHtml;
    if (insightsText === "AI Content Detected") {
        backgroundClass = 'swal-red';
        iconHtml = `<i class="fas fa-exclamation-triangle" style="color: orange;"></i> AI Content Detected.`;
    } else {
        backgroundClass = 'swal-green';
        iconHtml = `<i class="fas fa-check-circle" style="color: green;"></i> No AI Content Detected.`;
    }

    let matchedTextHtml = '';
    if (matchingTexts.length > 0) {
        matchedTextHtml = `<div><strong>AI Content Found:</strong></div><ul>`;
        matchingTexts.forEach(text => {
            matchedTextHtml += `<li class="matching-text">${text}</li>`;
        });
        matchedTextHtml += '</ul>';
    }

    // AI Content Percentage
    const aiContentPercentage = `{{ session('aiContentPercentage') }}`;
    const percentageHtml = `
        <div class="animated-percentage">AI Content Percentage: <span id="percentage">${aiContentPercentage}%</span></div>
        <div class="percentage-bar">
            <div class="percentage-fill" style="width: ${aiContentPercentage}%;"></div>
        </div>
    `;

    const sweetAlertContent = `
        <div>
            <span class="swal2-html ${backgroundClass}">${iconHtml}</span>
            <br><br>
            <iframe src="${thesisFilePath}" style="width: 100%; height: 300px; border: none;"></iframe>
            <br><br>
            <br><br>
            ${matchedTextHtml}
            <br>
            ${percentageHtml}
        </div>
    `;

    Swal.fire({
        title: 'Thesis Uploaded Successfully',
        html: sweetAlertContent,
        icon: 'success',
        confirmButtonText: 'OK',
        background: '#f8f9fa'
    });
</script>
@endif



@if(session('delete_success'))
<script>
    Swal.fire({
        title: 'Thesis Deleted Successfully',
        icon: 'success',
        confirmButtonText: 'OK',
    });
</script>
@endif

@if(session('delete_error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "{{ session('delete_error') }}",
        confirmButtonText: 'Okay'
    });
</script>
@endif
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
                form.submit();
            }
        });
    }
</script>
@endpush