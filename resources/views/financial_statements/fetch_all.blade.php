@extends('layout.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Financial Statements</h1>

    <!-- Search and Filter Form -->
    <form id="filterForm" method="GET" action="{{ route('financial-statements.fetch_all') }}" class="mb-4 flex space-x-4">
        <input
            type="text"
            id="search"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search by company name"
            class="border rounded px-4 py-2 w-full"
        >
        <input
            type="date"
            id="start_date"
            name="start_date"
            value="{{ request('start_date') }}"
            placeholder="Start Date"
            class="border rounded px-4 py-2"
        >
        <input
            type="date"
            id="end_date"
            name="end_date"
            value="{{ request('end_date') }}"
            placeholder="End Date"
            class="border rounded px-4 py-2"
        >
    </form>

    <!-- Table -->
    <div id="results" class="overflow-x-auto bg-white rounded-lg shadow-md">
        @include('financial_statements.partials.table', ['financialStatements' => $financialStatements])
    </div>

    <!-- Pagination -->
    <div id="pagination" class="mt-4">
        {{ $financialStatements->links() }}
    </div>
</div>
@endsection
