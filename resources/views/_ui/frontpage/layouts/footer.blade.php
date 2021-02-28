<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="d-flex align-items-center mb-2">
                    <img src="{{ asset('img/logo.png') }}" alt="" width="70px" class="mr-1">
                    <h3 class="text-dec text-dec-warning-2 text-dec-tr text-white font-weight-bold mb-0">
                        HIMATIF
                    </h3>
                </div>
                <h6 class="text-link font-weight-semibold mb-2">
                    Jalan. Kalimantan No. 37, Kampus 
                    Tegalboto, Jember, Jawa Timur, 
                    68121, Indonesia
                </h6>
                
                <h5 class="text-white font-weight-bold mb-1">SOCIAL</h5>
                <div class="row gutters-xs mb-1">
                    <div class="col-auto"><img src="{{ asset('img/icons/instagram.svg') }}" alt=""></div>
                    <div class="col"><h6 class="text-white font-weight-semibold">@himatifilkomunej</h6></div>
                </div>
                <div class="row gutters-xs mb-1">
                    <div class="col-auto"><img src="{{ asset('img/icons/youtube.svg') }}" alt=""></div>
                    <div class="col"><h6 class="text-white font-weight-semibold">himatifilkom</h6></div>
                </div>
            </div>
            {{-- divider --}}
            <div class="col-12 d-lg-none"><div class="divider bg-white op-1 my-1"></div></div>

            <div class="col-md-6 col-lg-3 offset-lg-1 pt-2">
                <h5 class="text-white font-weight-extrabold mb-2">NAVIGASI</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-md text-white font-weight-semibold pl-0 active" href="#">BERANDA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-md text-white font-weight-semibold pl-0 active" href="#">TENTANG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-md text-white font-weight-semibold pl-0" href="#">PROKER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-md text-white font-weight-semibold pl-0" href="#">BLOG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-md text-white font-weight-semibold pl-0" href="#">HIMATIF HELPER</a>
                    </li>
                </ul>
            </div>
            {{-- divider --}}
            <div class="col-12 d-md-none"><div class="divider bg-white op-1 my-1"></div></div>

            <div class="col-md-6 col-lg-4 pt-2">
                <h5 class="text-white font-weight-extrabold mb-2">INFO TERBARU</h5>

                {{-- list new info --}}
                <div class="row align-items-center mb-1">
                    <div class="col-auto">
                        <div class="card">
                            <div class="card-body" style="padding: .5rem">
                                <div class="img-fit img-fit-cover w-4rem h-4rem">
                                    <img src="{{ asset('img/galery/3.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="text-link font-weight-semibold">Workshop TIC bersama...</h6>
                    </div>
                </div>
                <div class="row align-items-center mb-1">
                    <div class="col-auto">
                        <div class="card">
                            <div class="card-body" style="padding: .5rem">
                                <div class="img-fit img-fit-cover w-4rem h-4rem">
                                    <img src="{{ asset('img/galery/1.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="text-link font-weight-semibold">Sarasehan Himatif x HMIT...</h6>
                    </div>
                </div>
                <div class="row align-items-center mb-1">
                    <div class="col-auto">
                        <div class="card">
                            <div class="card-body" style="padding: .5rem">
                                <div class="img-fit img-fit-cover w-4rem h-4rem">
                                    <img src="{{ asset('img/galery/5.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="text-link font-weight-semibold">Mediatek foto</h6>
                    </div>
                </div>
                {{-- end of list new info --}}
                <div class="d-flex align-items-center text-white font-weight-semibold mt-2">
                    <a href="" class="text-white">
                        Lihat Semua Blog 
                    </a>
                    <i class="fas fa-arrow-right text-height-0 ml-1"></i>
                </div>
                
            </div>
        </div>

        <div class="divider bg-white op-3 my-3"></div>
        <div class="text-link text-center font-weight-bold">Copyright 2020. Himatif, All rights reserved </div>
    </div>
</footer>