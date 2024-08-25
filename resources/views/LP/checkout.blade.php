@extends('LP.layouts.main')


@section('content')
    	<!-- Title page -->
        <section class="how-overlay2 bg-img1" style="background-image: url(/LP/assets/images/background/background4.jpg);">
            <div class="container">
			<div class="txt-center p-t-160 p-b-165">
				<h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
					Pembayaran
				</h2>

				<span class="txt-m-201 cl0 flex-c-m flex-w">
					<a href="/" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
						Home
					</a>

					<span>
						/ Pembayaran
					</span>
				</span>
			</div>
		</div>
	</section>

	<!-- content page -->
	<div class="bg0 p-t-95 p-b-50">
		<div class="container">
			<!-- Login -->

            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-7 col-lg-8 p-b-50">
                        <div>
                            <h4 class="txt-m-124 cl3 p-b-28">
                                Rincian Pembayaran
                            </h4>

                            <div class="row p-b-50">
                                <div class="col-sm-12 p-b-23">
                                    <div>
                                        <div class="txt-s-101 cl6 p-b-10">
                                            Nama Lengkap <span class="cl12">*</span>
                                        </div>

                                        <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text" name="name" value="{{ Auth::user()->name }}">
                                    </div>
                                </div>

                                <div class="col-12 p-b-23">
                                    <div>
                                        <div class="txt-s-101 cl6 p-b-10">
                                            Alamat Lengkap <span class="cl12">*</span>
                                        </div>
                                        <textarea class="plh2 txt-s-120 cl3 size-a-38 bo-all-1 bocl15 p-rl-20 p-tb-10 focus1" name="alamat" placeholder=""></textarea>
                                    </div>
                                </div>


                                <div class="col-sm-6 p-b-23">
                                    <div>
                                        <div class="txt-s-101 cl6 p-b-10">
                                            Nomor Handphone <span class="cl12">*</span>
                                        </div>
                                        <input class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text" name="nomor">
                                    </div>
                                </div>

                                <div class="col-sm-6 p-b-23">
                                    <div>
                                        <div class="txt-s-101 cl6 p-b-10">
                                            Alamat E-mail <span class="cl12">*</span>
                                        </div>

                                        <input value="{{ Auth::user()->email }}" class="txt-s-120 cl3 size-a-21 bo-all-1 bocl15 p-rl-20 focus1" type="text" name="email">
                                    </div>
                                </div>
                            </div>

                            <h4 class="txt-m-124 cl3 p-b-19">
                                Informasi Tambahan
                            </h4>

                            <div>
                                <div class="txt-s-101 cl6 p-b-10">
                                    Catatan
                                </div>

                                <textarea class="plh2 txt-s-120 cl3 size-a-38 bo-all-1 bocl15 p-rl-20 p-tb-10 focus1" name="note" placeholder="Catatan tentang pesanan Anda, misalnya. catatan khusus untuk pengiriman"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-lg-4 p-b-50">
                        <div class="how-bor4 p-t-35 p-b-40 p-rl-30 m-t-5">
                            <h4 class="txt-m-124 cl3 p-b-11">
                                Pesanan Kamu
                            </h4>

                            <div class="flex-w flex-sb-m txt-m-103 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
                                <span>
                                    Product
                                </span>

                                <span>
                                    Total
                                </span>
                            </div>
                            
                            <!--  -->
                            @foreach ($cartItems as $item)                            
                                <div class="flex-w flex-sb-m txt-s-101 cl6 bo-b-1 bocl15 p-b-21 p-t-18">
                                    <span>
                                        {{ $item->product->name }} 
                                        <img class="m-rl-3" src="/LP/assets/images/icons/icon-multiply.png" alt="icon">
                                        {{ $item->quantity }}
                                    </span>
                                    <span>
                                        @currency($item->product->price)
                                    </span>
                                </div>
                            @endforeach


                            
                            
                            <!--  -->
                            <div class="flex-w flex-m txt-m-103 bo-b-1 bocl15 p-tb-23">
                                <span class="size-w-61 cl6">
                                    Subtotal
                                </span>

                                <span class="size-w-62 cl9">
                                    @currency($total)
                                </span>
                            </div>

                            <div class="flex-w flex-m txt-m-103 p-tb-23">
                                <span class="size-w-61 cl6">
                                    Total
                                </span>

                                <span class="size-w-62 cl10">
                                    @currency($total)
                                </span>
                            </div>


                            <button class="flex-c-m txt-s-105 cl0 bg10 size-a-21 hov-btn2 trans-04 p-rl-10">
                                Bayar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
		</div>
	</div>
@endsection