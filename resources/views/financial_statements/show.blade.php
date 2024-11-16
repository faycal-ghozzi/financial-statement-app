@extends('layout.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Financial Statement Details for {{ $date }}</h1>

    <div class="bg-white rounded-lg shadow-md p-4">
        @forelse($financialStatements as $statement)
            <div class="mb-4">
                <h2 class="font-bold">{{ $statement->entryPoint->label }}</h2>
                <p>Category: {{ $statement->entryPoint->category }}</p>
                <p>Role: {{ $statement->entryPoint->role }}</p>
                <p>Value: {{ $statement->value }}</p>
            </div>
        @empty
            <p>No detailed financial statements found for this date.</p>
        @endforelse
    </div>
</div>
@endsection
