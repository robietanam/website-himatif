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

    <p>Silahkan gunakan kode berikut</p>
    @component('vendor.mail.html.kode', ['url' => 'https://example.com'])
        {{ $details['kode'] }}
    @endcomponent

    <p style="margin-bottom: 0;">Untuk mendaftar course <strong>{{ $details['label'] }} </strong></p>

    <p style="line-height: none; font-size:12px">Syarat dan ketentuan terlampir</p>

    @slot('subcopy')
        @component('mail::subcopy')
            HIMATIF, 2024
        @endcomponent
    @endslot
    <p>Terima kasih telah mengikuti <br>
        HIMATIF x CAKAP 2024</p>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            &copy; {{ date('Y') }} HIMATIF. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
