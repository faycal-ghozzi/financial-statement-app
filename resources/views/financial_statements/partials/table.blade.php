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
