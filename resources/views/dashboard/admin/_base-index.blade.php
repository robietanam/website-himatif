@extends('dashboard._layouts.app')

@section('title', 'Keanggotaan') {{-- title --}}
@section('header', 'Keanggotaan') {{-- header --}}

@section('breadcrumb') {{-- breadcrumb --}}
    <div class="breadcrumb-item active"><a href="#">Root</a></div>
    <div class="breadcrumb-item">Child</div>
@endsection {{-- end of breadcrumb --}}

@section('content') {{-- content --}}
    <div class="row">
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'primary'])
                @slot('icon', 'fas fa-users')
                @slot('title', 'Pengurus')
                @slot('content', '25') 
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'info'])
                @slot('icon', 'fas fa-users')
                @slot('title', 'Anggota')
                @slot('content', '500') 
            @endcomponent
        </div>
        <div class="col-md-4">
            @component('dashboard._components.widget', ['color' => 'secondary'])
                @slot('icon', 'fas fa-users')
                @slot('title', 'Demisioner')
                @slot('content', '50') 
            @endcomponent
        </div>
    </div>
@endsection {{-- end of content --}}

@section('style') {{-- style --}}
    
@endsection {{-- end of style --}}

@section('script') {{-- script --}}
    
@endsection {{-- end of script --}}