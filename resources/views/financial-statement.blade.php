@extends('layout.app')

@section('title', 'Formulaire Bilan Comptable')

@section('content')
    <div class="bg-white p-8 shadow-md rounded-lg ">
        <h2 class="text-2xl font-bold mb-8 text-center col-secondary">
            Insérer un nouveau Bilan
        </h2>

        @if(session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-200 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form {{--action="{{ route('financial-statement.store') }}"--}} id="financial-form" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @include('financials.step1')
            @include('financials.step2')
            @include('financials.step3')
            @include('financials.step4')
            @include('financials.step5')
        </form>
    </div>
@endsection