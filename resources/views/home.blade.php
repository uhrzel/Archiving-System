@extends('layouts.app')

@section('content')
<div class="main-content">
    <div id="thesis" class="section pt-20 pb-8 md:pt-16 md:pb-0 bg-light">
        <header class="text-center mb-4">

            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="margin: 0 auto;height: 35px;" xml:space="preserve">
                <circle cx="50.1" cy="30.4" r="5" class="stroke-primary" style="fill: transparent;stroke-width: 2;stroke-miterlimit: 10;"></circle>
                <line x1="55.1" y1="30.4" x2="100" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                <line x1="45.1" y1="30.4" x2="0" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
            </svg>
            <p class="text-muted font-weight-light mx-auto pb-2">Explore academic works preserving knowledge and innovation.</p>
        </header>
        <div class="container">
            <div class="row">
                @foreach ($thesis as $thesis_data)
                @if ($thesis_data->status !== 'pending' && $thesis_data->status !== 'declined')
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm d-flex flex-column">
                        <div class="card-body flex-grow-1">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $thesis_data->thesis_title }}</h3>
                            <p class="text-gray-600"><strong>Abstract:</strong> {{ $thesis_data->abstract }}</p>
                            <p class="text-gray-500"><strong>Author:</strong> {{ $thesis_data->user->name }}</p>
                        </div>
                        <!-- PDF Viewer Section -->
                        <div class="pdf-viewer" style="flex-shrink: 0;">
                            <iframe src="{{ asset('storage/thesis/' . basename($thesis_data->thesis_file)) }}" class="w-100" style="height: 300px;" allowfullscreen></iframe>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ asset('storage/thesis/' . basename($thesis_data->thesis_file)) }}" target="_blank" class="btn btn-primary">
                                <i class="fas fa-file-pdf mr-1"></i> View PDF
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection