@extends('frontpage.layouts.app-frontpage')

@section('title', 'Detail Blog')

@section('pageClass', 'blog')
@section('content')

    <main class="py-5 py-md-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card bg-white mb-3">
                        <div class="card-body">
                            <h4 class="text-midnight font-bold mb-2">{{ $blog->title }}</h4>
                            <div class="img-fit img-fit-cover w-100 h-20rem h-md-30rem h-lg-40rem rounded-sm mb-3">
                                {{-- isue --}}
                                <img src="{{ asset($blog->photo ? "storage/$blog->photo" : 'img/misc/default-post.jpg') }}"
                                    alt="">
                            </div>
                            <div class="d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="text-midnight font-bold mb-2">{{ $blog->category->name }}</h5>
                                    <p class="text-gray">{{ $blog->body }}</p>
                                </div>
                                <span class="text-sm text-gray mt-3">{{ $blog->created_at ?? '' }}</span>
                            </div>

                            <hr class="my-3">

                            <div id="disqus_thread"></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card bg-white">
                        <div class="card-body">

                            <h5 class="text-midnight font-bold mb-2">Blog Lainnya</h5>
                            <div class="row gutters-xs mb-3">
                                <div class="col-auto">
                                    <div class="img-fit img-fit-cover w-4rem h-4rem rounded-sm">
                                        <img src="{{ asset('img/galery/1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col pl-1">
                                    <div class="text-midnight font-bold">Event Baru Telah Hadir</div>
                                    <div class="text-sm text-gray">Lorem, ipsum...</div>
                                </div>
                            </div>
                            <div class="row gutters-xs mb-3">
                                <div class="col-auto">
                                    <div class="img-fit img-fit-cover w-4rem h-4rem rounded-sm">
                                        <img src="{{ asset('img/galery/1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col pl-1">
                                    <div class="text-midnight font-bold">Event Baru Telah Hadir</div>
                                    <div class="text-sm text-gray">Lorem, ipsum...</div>
                                </div>
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
