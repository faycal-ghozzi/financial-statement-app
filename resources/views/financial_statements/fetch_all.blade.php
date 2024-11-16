@extends('layout.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Financial Statements</h1>

    <!-- Search and Filter Form -->
    <form method="GET" action="{{ route('financial-statements.fetch_all') }}" class="mb-4 flex space-x-4">
        <input 
            type="text" 
            name="search" 
            value="{{ request('search') }}" 
            placeholder="Search by company name" 
            class="border rounded px-4 py-2 w-full"
        >
        <input 
            type="date" 
            name="start_date" 
            value="{{ request('start_date') }}" 
            placeholder="Start Date" 
            class="border rounded px-4 py-2"
        >
        <input 
            type="date" 
            name="end_date" 
            value="{{ request('end_date') }}" 
            placeholder="End Date" 
            class="border rounded px-4 py-2"
        >
        <button 
            type="submit" 
            class="bg-blue-500 text-white px-4 py-2 rounded"
        >
            Filter
        </button>
    </form>

    <!-- Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
        <table class="table-auto w-full text-left">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">Company Name</th>
                    <th class="px-4 py-2">Financial Statement Date</th>
                    <th class="px-4 py-2">Document</th>
                    <th class="px-4 py-2">Consult</th>
                </tr>
            </thead>
            <tbody>
                @forelse($financialStatements as $statement)
                    <tr>
                        <td class="border px-4 py-2">{{ $statement->company->name }}</td>
                        <td class="border px-4 py-2">{{ $statement->date }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ asset($statement->file_path) }}" target="_blank" class="text-blue-500 underline">
                                Download
                            </a>
                        </td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('financial-statements.show', ['id' => $statement->id, 'date' => $statement->date]) }}" 
                               class="text-blue-500 underline">
                                Consult
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">No financial statements found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $financialStatements->links() }}
    </div>
</div>
@endsection
