@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => 'https://himatif.ilkom.unej.ac.id/pemilu'])
            HIMATIF PEMILU
        @endcomponent
    @endslot

    {{-- Body --}}
    <h1>Halo, Mahasiswa Teknologi Informasi 👋,</h1>

    <p>Berikut adalah Token yang digunakan untuk Pemilu HIMATIF 2024</p>

    @component('vendor.mail.html.kode', ['url' => 'https://himatif.ilkom.unej.ac.id/pemilu'])
        {{ $details['token'] }}
    @endcomponent

    <p style="margin-bottom: 0;">Pemilihan dapat dilakukan mulai
        <strong>{{ formatTimeRange(config('election.start'), config('election.end')) }} </strong>
    </p>

    <p> <br> Untuk mekanisme pemilihan pemilu dapat dilihat pada website HIMATIF
        <a href= "https://himatif.ilkom.unej.ac.id/pemilu"> Klik disini </a>
    </p>

    @slot('subcopy')
        @component('mail::subcopy')
            HIMATIF MUDA TIDAK MENYERAH
        @endcomponent
    @endslot
    <p>Terima kasih atas partisipasinya pada <br>
        <strong>Pemilu HIMATIF 2024</strong>
    </p>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            &copy; {{ date('Y') }} HIMATIF. All rights reserved.
        @endcomponent
    @endslot
@endcomponent
