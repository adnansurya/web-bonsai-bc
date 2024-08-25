
@extends('LP.layouts.main')

@section('content')
<section class="how-overlay2 bg-img1" style="background-image: url('/LP/assets/images/background/background1.jpg');">
    <div class="container">
        <div class="txt-center p-t-160 p-b-165">
            <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                Tentang Kami
            </h2>

            <span class="txt-m-201 cl0 flex-c-m flex-w">
                <a href="/" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
                    Beranda
                </a>

                <span>
                    / Tentang Kami
                </span>
            </span>
        </div>
    </div>
</section>


<!-- Story -->
<section class="sec-story bg0 p-t-150 p-b-100">
    <div class="container">
        <div class="flex-w flex-sb-t">
            <div class="size-w-31 wrap-pic-w how-shadow2 bo-all-15 bocl0 w-full-md">
                <img src="/LP/assets/images/background/background2.jpg" alt="IMG">
            </div>

            <div class="size-w-32 p-t-43 w-full-md">
                <h3 class="txt-center txt-l-401 cl15 p-b-44">
                    Cerita dari Perkebunan kami
                </h3>

                <p class="txt-center txt-m-115 cl6 p-b-25">
                    Bonleaf, perusahaan perkebunan di pedalaman Indonesia, dipelopori oleh Sabira, seorang penyuka tanaman hias lokal yang memiliki impian besar. Dengan modal terbatas, Sabira menanam berbagai tanaman hias.
                </p>

                <p class="txt-center txt-m-115 cl6 p-b-25">
                    Bonleaf dikenal karena hasil panen Tanaman hias yang berkualitas tinggi. Produk-produk Bonleaf sangat diminati di pasar lokal dan internasional.
                </p>

                <p class="txt-center txt-m-115 cl6 p-b-25">
                    Bonleaf berkomitmen pada pembangunan masyarakat, terus mengembangkan program sosial yang memberikan kontribusi positif. Dengan semangat dan tekad, Bonleaf terus maju, menjadi teladan dalam etika bisnis dan keberlanjutan.
                </p>

                <p class="txt-center txt-m-115 cl6 p-b-25">
                    Bonleaf menunjukkan bahwa dengan semangat yang kuat, impian sederhana dapat menjadi luar biasa.
                </p>

                <div class="flex-w flex-c-b p-t-50 p-t-30">

                    <!-- Aktifkan untuk Memunculkan tanda tangan -->
                    {{-- <img class="m-r-55" src="/LP/assets/images/icons/sign.png" alt="SIGN"> --}}

                    <div class="flex-col-l p-b-5">
                        <span class="txt-m-401 cl10 p-b-2">
                            Sabira Mufida
                        </span>

                        <span class="txt-s-106 cl6">
                            CEO Bonleaf Indonesia
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection