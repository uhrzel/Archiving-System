@extends('layouts.app')

@section('title', 'Pending Page')

@section('content')
<style>
    .dropdown-menu {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
    }

    .dropdown-item {
        color: #212529;
    }

    .dropdown-item:hover {
        background-color: #e9ecef;
        color: #ffffff;
    }

    .published:hover {
        background-color: #28a745;
        color: white;
    }

    .declined:hover {
        background-color: #dc3545;
        color: white;
    }

    .view:hover {
        background-color: blue;
        color: white;
    }
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pending Page</h1>
        </div>
        <div class="section-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Authors</th>
                            <th>Thesis Title</th>
                            <th>Thesis Course</th>
                            <th>Thesis Status</th>
                            <th>Plagiarism Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($thesis as $thesis_data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $thesis_data->user->name ?? 'Unknown' }}</td>
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
                                @if($thesis_data->plagiarized == '1')
                                <span class="bg-danger text-white px-1 py-1 rounded">
                                    <i class="fa fa-exclamation-circle"></i> <!-- Warning icon -->
                                    Plagiarized
                                </span>
                                @elseif($thesis_data->plagiarized == '0')
                                <span class="bg-success text-white px-3 py-1 rounded">
                                    <i class="fa fa-check-circle"></i> <!-- Success icon -->
                                    Original
                                </span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{ $thesis_data->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        Actions
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $thesis_data->id }}">
                                        <li>
                                            <a class="dropdown-item view" href="#" onclick="showModal({{ $thesis_data->id }})">View</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item published" href="#" onclick="updateStatus({{ $thesis_data->id }}, 'Published')">Published</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item declined" href="#" onclick="updateStatus({{ $thesis_data->id }}, 'Declined')">Declined</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="thesisModal" tabindex="-1" aria-labelledby="thesisModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="thesisModalLabel">Thesis Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="thesisDetailsContent">
                    <!-- Thesis details will be displayed here -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function updateStatus(thesisId, status) {
        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to mark this thesis as ${status}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('thesis.updateStatus') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        thesis_id: thesisId,
                        status: status
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Status Updated!',
                                text: `The thesis status has been changed to ${response.status}`,
                                confirmButtonText: 'Okay'
                            }).then(() => {
                                location.reload();
                            });
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong. Please try again.',
                            confirmButtonText: 'Okay'
                        });
                    }
                });
            }
        });
    }

    function showModal(thesisId) {
        $.ajax({
            url: '/thesis/' + thesisId, // Update this URL to match your route
            method: 'GET',
            success: function(data) {
                // Determine the status class based on the thesis status
                let statusClass = '';
                switch (data.status) {
                    case 'pending':
                        statusClass = 'text-bg-warning'; // Yellow background for pending
                        break;
                    case 'published':
                        statusClass = 'text-bg-success'; // Green background for published
                        break;
                    case 'declined':
                        statusClass = 'text-bg-danger'; // Red background for declined
                        break;
                    default:
                        statusClass = 'text-bg-secondary'; // Default gray background for other statuses
                }

                $('#thesisDetailsContent').html(`
                <div class="mb-3">
                    <h6 class="font-weight-bold">Title:</h6>
                    <p>${data.thesis_title}</p>
                </div>
                <div class="mb-3">
                    <h6 class="font-weight-bold">Authors:</h6>
                    <p>${data.user.name || 'Unknown'}</p>
                </div>
                <div class="mb-3">
                    <h6 class="font-weight-bold">Course:</h6>
                    <p>${data.thesis_course}</p>
                </div>
                <div class="mb-3">
                    <h6 class="font-weight-bold">Status:</h6>
                <span class="${statusClass} px-2 py-1 rounded"> ${data.status}</span>
                </div>
                <div class="mb-3">
                    <h6 class="font-weight-bold">Thesis File:</h6>
                    <iframe src="${data.thesis_file_path}" class="w-full h-64 border border-gray-300 rounded-lg" style="overflow: auto;" allowfullscreen></iframe>
                </div>
                <div class="mb-3">
                    <a href="${data.thesis_file_path}" target="_blank" class="btn btn-danger">View PDF</a>
                </div>
            `);
                $('#thesisModal').modal('show'); // Show the modal
            },
            error: function() {
                alert('Error fetching thesis details.');
            }
        });
    }
</script>
@endsection