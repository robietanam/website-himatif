@extends('frontpage.layouts.app-frontpage')

@section('title', 'Detail Blog')

@section('pageClass', 'blog')
@section('content')

    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card bg-white mb-3">
                        <div class="card-body">
                            <h2 class="text-midnight font-bold mb-3">{{ $post->title }}</h2>
                            <div class="img-fit img-fit-cover w-100 h-20rem h-md-30rem h-lg-40rem rounded-sm mb-3">
                                @if ($post->photo)
                                    <img src="{{ asset('storage/'.$post->photo) }}" alt="">
                                @else
                                    <img src="{{ asset('img/placeholder/product-image-default.svg') }}" alt="">
                                @endif
                            </div>
                            <div class="">
                                <div>
                                    <div class="badge badge-link bg-gray mb-1">{{ $post->category->name }}</div>
                                    <div class="text-sm text-gray mb-3">
                                        {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                    </div>
                                    <p class="text-gray">
                                        {!! $post->body !!}
                                    </p>
                                </div>
                            </div>

                            <hr class="my-3">

                            <div id="disqus_thread"></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card bg-white">
                        <div class="card-body">
                            <h5 class="text-midnight font-bold mb-2">Berita Lainnya</h5>
                            <ul class="list-group list-group-flush">
                                @foreach ($otherPosts as $otherPost)
                                    <li class="list-group-item px-0 py-2">
                                        <div class="row gutters-xs">
                                            <div class="col-auto">
                                                <div class="img-fit img-fit-cover w-4rem h-4rem rounded-sm">
                                                    @if ($otherPost->photo)
                                                        <img src="{{ asset('storage/'.$otherPost->photo) }}" alt="">
                                                    @else
                                                        <img src="{{ asset('img/placeholder/product-image-default.svg') }}" alt="">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col pl-1">
                                                <a href="{{ $otherPost->slug }}" class="text-midnight font-bold">
                                                    {{ $otherPost->title }}
                                                </a>
                                                <div class="text-sm text-gray">
                                                    {{ substr(strip_tags($otherPost->body), 0, 18) . ((strlen(strip_tags($otherPost->body)) > 18) ? '...' : '') }}
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
    <style>

    </style>
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
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document,
                s = d.createElement('script');

            s.src = 'https://firmantest.disqus.com/embed.js';

            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
@endsection
