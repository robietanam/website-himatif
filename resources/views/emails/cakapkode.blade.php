@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    <h1>Halo, {{ $details['nama'] }}</h1>

    <p>Selamat anda berhasil mendapatkan voucher cakap.com</p>

    Silahkan gunakan kode berikut
    @component('vendor.mail.html.kode', ['url' => 'https://example.com'])
        {{ $details['kode'] }}
    @endcomponent


    <p>Untuk mendaftar pada course <strong>{{ $details['label'] }} </strong> pada cakap.com</p>

    @slot('subcopy')
        @component('mail::subcopy')
            HIMATIF, 2024
        @endcomponent
    @endslot
    <p>Terima kasih telah mendaftar pada,<br>
        HIMATIF x CAKAP 2024</p>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            &copy; {{ date('Y') }} HIMATIF. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
