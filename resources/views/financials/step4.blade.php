@php
    $previousCategory = null;
    $firstEntry = true;
@endphp

<h3 class="text-2xl font-bold mb-6">État de Résultat</h3>
<section>
    <div class="grid grid-cols-1 gap-y-8">
        @foreach($resultats as $resultat)
            @if ($previousCategory !== $resultat->category)
            <div class="grid grid-cols-3 items-center gap-x-4">
                @if($firstEntry)
                    <h3 class="text-lg font-semibold mt-8 flex items-center justify-center col-start-2">n-1</h3>
                    <h3 class="text-lg font-semibold mt-8 flex items-center justify-center col-start-3">n</h3>
                @endif
            </div>
                @php
                    $firstEntry = false;
                @endphp
            @endif

            <div class="grid grid-cols-3 items-center gap-x-4">
                <label class="font-medium text-gray-700">{{ $resultat->label }}</label>
                
                <input type="text" name="resultats[{{ $resultat->id }}][n-1]"
                       id="resultats_{{ strtolower(str_replace([' ', '\''], ['_', ''], $resultat->label)) }}_n-1"
                       placeholder="Year -1" {{-- required --}}
                       class="px-4 py-2 border rounded-md w-full text-right number" 
                       {{ str_contains(strtolower($resultat->label), 'total') || str_contains(strtolower($resultat->label), 'résultat') ? 'disabled' : ''}}
                       data-role="{{ $resultat->role }}"
                       data-year="n-1"
                       />

                <input type="text" name="resultats[{{ $resultat->id }}][n]" 
                       id="resultats_{{ strtolower(str_replace([' ', '\''], ['_', ''], $resultat->label)) }}_n"
                       placeholder="Current Year" {{-- required --}}
                       class="px-4 py-2 border rounded-md w-full text-right number" 
                       {{ str_contains(strtolower($resultat->label), 'total') || str_contains(strtolower($resultat->label), 'résultat')  ? 'disabled' : ''}}
                       data-role="{{ $resultat->role }}"
                       data-year="n"
                       />
            </div>
        @endforeach
    </div>

</section>