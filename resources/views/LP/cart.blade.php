@extends('LP.layouts.main')


@section('content')
<section class="how-overlay2 bg-img1" style="background-image: url(/LP/assets/images/background/background4.jpg);">
    <div class="container">
        <div class="txt-center p-t-160 p-b-165">
            <h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
                Keranjang
            </h2>

            <span class="txt-m-201 cl0 flex-c-m flex-w">
                <a href="/" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
                    Home
                </a>

                <span>
                    / Keranjang
                </span>
            </span>
        </div>
    </div>
</section>




<!-- content page -->
<div class="bg0 p-tb-100">
		<div class="container">
			@if (session()->has('delete'))
			<div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				{{ session('delete') }} <a href="/cart" class="text-danger" style="text-decoration: underline"><strong>Keranjang</strong></a>
			</div>
		@endif

		@if ($cartItems->isEmpty())
		<h5>Keranjang Kosong</h5>
		@else
			<div class="wrap-table-shopping-cart">
				<table class="table-shopping-cart">
					<tr class="table_head bg12">
						<th class="column-1 p-l-30">Produk</th>
						<th class="column-2">Harga</th>
						<th class="column-3">Kuantitas</th>
						<th class="column-4">Total</th>
					</tr>

					@foreach ($cartItems as $item)
					<tr class="table_row">
						<td class="column-1">
							<div class="flex-w flex-m">
								<div class="wrap-pic-w size-w-50 bo-all-1 bocl12 m-r-30">
									<img src="{{ asset('storage/' . $item->product->image) }}" alt="IMG">
								</div>

								<span>
									{{ $item->product->name }}
								</span>
							</div>
						</td>
						<td class="column-2">
							@currency($item->product->price)
						</td>
						<td class="column-3">
							<div class="wrap-num-product flex-w flex-m bg12 p-rl-10 text-center">
								{{ $item->quantity }}
							</div>
						</td>
						<td class="column-4">
							<div class="flex-w flex-sb-m">
								<span>
									@currency( $item->product->price * $item->quantity)
								</span>
								<form action="/cart/remove/{{ $item->id }}" method="POST">
									@csrf
									<div class="fs-15 hov-cl10 pointer">
										<button type="submit">
											<span class="lnr lnr-cross"></span>
										</button>
									</div>
								</form>

							</div>
						</td>
					</tr>
					@endforeach
					


				</table>
			</div>

			<div class="flex-w flex-row-reverse p-t-68">
				<div class="flex-col-l" id="total">
					<span class="txt-m-123 cl3 p-b-18">
						Total Keranjang
					</span>

					<div class="flex-w flex-m bo-b-1 bocl15 w-full p-tb-18">
						<span class="size-w-58 txt-m-109 cl3">
							Subtotal
						</span>

						<span class="size-w-59 txt-m-104 cl6">
							@currency($total)
						</span>
					</div>

					<div class="flex-w flex-m bo-b-1 bocl15 w-full p-tb-18">
						<span class="size-w-58 txt-m-109 cl3">
							Total
						</span>

						<span class="size-w-59 txt-m-104 cl10">
							@currency($total)
						</span>
					</div>

					{{-- <form action="{{ route('checkout') }}" method="POST">
						@csrf

					</form> --}}

					<a href="/checkout" class="flex-c-m txt-s-105 cl0 bg10 size-a-34 hov-btn2 trans-04 p-rl-10 m-t-43">
						Lanjutkan Ketahap Pembayaran
					</a>

				</div>
			</div>
		@endif

	</div>
</div>
	</div>
@endsection