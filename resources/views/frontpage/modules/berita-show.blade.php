@extends('frontpage.layouts.app-frontpage')

@section('title', 'Detail Blog')

@section('pageClass', 'blog')
@section('content')

    <main class="py-5 bg-gray-100">
        <div class="container mx-auto max-sm:px-5 ">
            <div class="flex flex-wrap ">
                <div class="lg:w-2/3 ">
                    <div
                        class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 p-4 mb-3">
                        <div class="flex-auto p-6">
                            <h2 class="text-midnight font-bold mb-3 max-sm:text-4xl">{{ $post->title }}</h2>
                            <div
                                class="img-fit img-fit-cover mx-auto w-fit h-[10rem] md:h-[20rem] lg:h-[25rem]  rounded-sm mb-3">
                                @if ($post->photo)
                                    <img src="{{ asset('storage/' . $post->photo) }}" alt="">
                                @else
                                    <img src="{{ asset('img/placeholder/product-image-default.svg') }}" alt="">
                                @endif
                            </div>
                            <div class="content-style">
                                <div>
                                    <div
                                        class="inline-block p-1 text-center font-semibold text-sm align-baseline leading-none rounded-md badge-link bg-gray mb-1">
                                        {{ $post->category->name }}</div>
                                    <div class="text-sm text-gray mb-3">
                                        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                    </div>
                                    <div class="text-gray ck-content">
                                        {!! $post->body !!}
                                    </div>
                                </div>
                            </div>

                            <hr class="my-3">

                            <div id="disqus_thread"></div>
                        </div>
                    </div>

                </div>
                <div class="flex-grow lg:w-1/3 lg:pl-5">
                    <div
                        class="relative flex flex-col min-w-0 rounded-md break-words border bg-white border-1 border-gray-300 bg-white">
                        <div class="flex-auto p-6">
                            <h5 class="text-midnight font-bold mb-2">Berita Lainnya</h5>
                            <ul class="flex flex-col pl-0 mb-0 border rounded-md border-gray-300 ">
                                @foreach ($otherPosts as $otherPost)
                                    <li
                                        class=" relative block py-3 px-6 -mb-px border border-r-0 border-l-0 border-gray-300 no-underline">
                                        <div class="flex flex-wrap  gutters-xs">
                                            <div class="col-auto">
                                                <div class="img-fit img-fit-cover w-[4rem] h-[4rem] rounded-sm">
                                                    @if ($otherPost->photo)
                                                        <img src="{{ asset('storage/' . $otherPost->photo) }}"
                                                            alt="">
                                                    @else
                                                        <img src="{{ asset('img/placeholder/product-image-default.svg') }}"
                                                            alt="">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="relative flex-grow max-w-full flex-1 px-4 pl-1">
                                                <a href="{{ $otherPost->slug }}" class="text-midnight font-bold">
                                                    {{ $otherPost->title }}
                                                </a>
                                                <div class="text-sm text-gray">
                                                    {{ substr(strip_tags($otherPost->body), 0, 18) . (strlen(strip_tags($otherPost->body)) > 18 ? '...' : '') }}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="mt-3">
                                <a href="{{ route('frontpage.berita') }}" class="text-gray mt-2">
                                    Tampilkan Semua Berita
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@section('style')

    @vite('resources/css/frontpage/ckeditor.css')

    {{-- <link href="{{ asset('css/app-dashboard-berita.min.css') }}" rel="stylesheet">

    <link href="{{ asset('vendors/ckeditor5/ckeditor.css') }}" rel="stylesheet"> --}}

@endsection

@section('script')


    <script>
        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
         */
        /*
        var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        // (function() { // DON'T EDIT BELOW THIS LINE
        //     var d = document,
        //         s = d.createElement('script');

        //     s.src = 'https://firmantest.disqus.com/embed.js';

        //     s.setAttribute('data-timestamp', +new Date());
        //     (d.head || d.body).appendChild(s);
        // })();
    </script>
@endsection
