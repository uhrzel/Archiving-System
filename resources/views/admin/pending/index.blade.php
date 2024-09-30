@extends('layouts.app')

@section('title', 'Pending Page')

@section('content')

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

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($thesis as $thesis_data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            </td>
                            <td>{{ $thesis_data->user->name ?? 'Unknown' }}</td> <!-- Display author's name -->
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


                            <td>
                                <button type="button" class="btn btn-primary me-2" style="width: 90px;" onclick="updateStatus({{ $thesis_data->id }}, 'Published')">
                                    Published
                                </button>
                                <button type="button" class="btn btn-danger" style="width: 90px;" onclick="updateStatus({{ $thesis_data->id }}, 'Declined')">
                                    Declined
                                </button>
                            </td>
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
    function updateStatus(thesisId, status) {
        // Show confirmation dialog
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
                            // Show success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Status Updated!',
                                text: `The thesis status has been changed to ${response.status}`,
                                confirmButtonText: 'Okay'
                            }).then(() => {
                                // Refresh the page after confirmation
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
</script>



@endpush