@extends('layout.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Financial Statement for {{ $file->company->name }}</h1>
    <p class="mb-4"><strong>Statement Date:</strong> {{ $file->date }}</p>

    @foreach ($categories as $category => $entries)
    <section class="mb-6">
        <!-- Category Header -->
        <h2 class="text-xl font-bold mb-4">{{ $category }}</h2>

        <!-- Table Headers -->
        <div class="grid grid-cols-3 gap-4 items-center">
            <div class="text-lg font-semibold">Entry</div>
            <div class="text-lg font-semibold text-center">n</div>
            <div class="text-lg font-semibold text-center">n-1</div>
        </div>

        <!-- Entries -->
        @foreach ($entries as $entry)
        <div class="grid grid-cols-3 gap-4 items-center {{ $entry->decoration == 'stripe' ? 'bg-gray-200' : '' }}">
            <!-- Label -->
            <div class="{{ $entry->decoration == 'bold' ? 'font-bold' : '' }}">
                {{ $entry->label }}
            </div>
            
            <!-- Current Year Value -->
            <div class="text-center">
                {{
                    isset($financialStatements[$dateCurrentYear." 00:00:00"])
                        ? $financialStatements[$dateCurrentYear." 00:00:00"]->firstWhere('entry_point_id', $entry->id)->value ?? '-'
                        : '-'
                }}
            </div>

            <!-- Previous Year Value -->
            <div class="text-center">
                {{
                    isset($financialStatements[$datePreviousYear." 00:00:00"])
                        ? $financialStatements[$datePreviousYear." 00:00:00"]->firstWhere('entry_point_id', $entry->id)->value ?? '-'
                        : '-'
                }}
            </div>
        </div>
        @endforeach
    </section>
    @endforeach
</div>
@endsection
