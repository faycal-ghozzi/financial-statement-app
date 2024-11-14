
@php
    $previousCategory = null;
    $firstEntry = true;
@endphp

<h3 class="text-2xl font-bold mb-6">Actifs</h3>
<section>
    <div class="grid grid-cols-1 gap-y-8">
        @foreach($actifs as $actif)
            @if ($previousCategory !== $actif->category)
            <div class="grid grid-cols-3 items-center gap-x-4">
                <h3 class="text-lg font-semibold mt-8">{{ $actif->category }}</h3>
                @if($firstEntry)
                    <h3 class="text-lg font-semibold mt-8 flex items-center justify-center">n-1</h3>
                    <h3 class="text-lg font-semibold mt-8 flex items-center justify-center">n</h3>
                @endif
            </div>

                @if ($previousCategory === null)
                    <h4 class="font-medium text-gray-600">Actifs Immobilisés</h4>
                @endif
                @php
                    $firstEntry = false;
                    $previousCategory = $actif->category;
                @endphp
            @endif

            <div class="grid grid-cols-3 items-center gap-x-4" data-decoration="{{ $actif->decoration }}">
                <label class="{{ $actif->decoration == 'stripe' ? 'font-bold text-white' : 'text-gray-700 font-medium'}} {{ $actif->decoration == 'bold' ? 'text-black font-bold' : 'text-gray-700 font-medium'}}">{{ $actif->label }}</label>
                
                <input type="text" name="actifs[{{ $actif->id }}][n-1]"
                       id="actifs_{{ strtolower(str_replace([' ', '\'', '(', ')', '/'], ['_', '', '', '', '_'], $actif->label)) }}_n-1"
                       placeholder="Year -1" {{-- required --}}
                       class="px-4 py-2 border rounded-md w-full text-right number" 
                       {{ str_contains(strtolower($actif->label), 'total') ? 'disabled' : ''}}
                       data-role="{{ $actif->role }}"
                       data-type="{{ $actif->type }}"
                       data-year="n-1"
                       />

                <input type="text" name="actifs[{{ $actif->id }}][n]" 
                       id="actifs_{{ strtolower(str_replace([' ', '\'', '(', ')', '/'], ['_', '', '', '', '_'], $actif->label)) }}_n"
                       placeholder="Current Year" {{-- required --}}
                       class="px-4 py-2 border rounded-md w-full text-right number" 
                       {{ str_contains(strtolower($actif->label), 'total') ? 'disabled' : ''}}
                       data-role="{{ $actif->role }}"
                       data-type="{{ $actif->type }}"
                       data-year="n"
                       />
                
                @php
                    $firstWord = strtolower(explode(' ', $actif->label)[0]);
                @endphp
                @if(in_array($firstWord, ['amortissements', 'provisions']))
                    <div class="grid grid-cols-3 col-span-3 mt-2 gap-x-4">
                        <input type="text" name="actifs[{{ strtolower($actif->label) }} result][n-1]" 
                               id="actifs_{{ strtolower(str_replace([' ', '\'', '(', ')', '/'], ['_', '', '', '', '_'], $actif->label)) }}_n-1_result"
                               placeholder="Year -1" disabled
                               class="px-4 py-2 border bg-gray-100 rounded-md w-full text-right col-start-2 number" 
                                data-role="{{ $actif->role }}"
                       />
                        <input type="text" name="actifs[{{ strtolower($actif->label) }} result][n]" 
                               id="actifs_{{ strtolower(str_replace([' ', '\'', '(', ')', '/'], ['_', '', '', '', '_'], $actif->label)) }}_n_result"
                               placeholder="Current Year" disabled
                               class="px-4 py-2 border bg-gray-100 rounded-md w-full text-right col-start-3 number"
                               data-role="{{ $actif->role }}"
                       />
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</section>