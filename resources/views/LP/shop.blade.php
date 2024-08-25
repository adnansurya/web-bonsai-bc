@extends('LP.layouts.main')


@section('content')
    	<!-- Title page -->
	<section class="how-overlay2 bg-img1" style="background-image: url(/LP/assets/images/background/background4.jpg);">
		<div class="container">
			<div class="txt-center p-t-160 p-b-165">
				<h2 class="txt-l-101 cl0 txt-center p-b-14 respon1">
					shop
				</h2>

				<span class="txt-m-201 cl0 flex-c-m flex-w">
					<a href="index.html" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
						Home
					</a>

					<span>
						/ Produk
					</span>
				</span>
			</div>
		</div>
	</section>




    <!-- Content page -->
	<section class="bg0 p-t-85 p-b-45">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-4 col-lg-3 m-rl-auto p-b-50">
					<div class="leftbar p-t-15">
						<!--  -->
						<form action="/shop" method="GET">
							@if (request('category'))
							<input type="hidden" name="category" value="{{ request('category') }}" id="">
							@endif

							@if (request('search'))
							<input type="hidden" name="search" value="{{ request('search') }}" id="">
							@endif
							<div class="size-a-21 pos-relative">
								<input value="{{ request('search') }}" class="s-full bo-all-1 bocl15 p-rl-20" type="text" name="search" placeholder="Cari Produk..." autocomplete="off">
								<button class="flex-c-m fs-18 size-a-22 ab-t-r hov11" type="submit">
									<img class="hov11-child trans-04" src="/LP/assets/images/icons/icon-search.png" alt="ICON">
								</button>
							</div>
						</form>

						<!--  -->
						<div class="p-t-45">
							<h4 class="txt-m-101 cl3">
								FILTER HARGA
							</h4>
							
							<form action="/shop" method="GET">
							<div class="p-t-10 ">
								<div class="flex-sb-m size-a-21 pos-relative">
										<input value="{{ request('min_price') }}" class="s-full bo-all-1 bocl15 p-rl-20 mr-10" type="number" name="min_price" placeholder="Min. Harga" autocomplete="off">
										<input value="{{ request('max_price') }}" class="s-full bo-all-1 bocl15 p-rl-20" type="number" name="max_price" placeholder="Max. Harga" autocomplete="off">
									</div>
									<div>
										<button style="width: 100%" type="submit" class="txt-s-103 cl0 bg10 size-a-2 hov-btn2 trans-04 flex-c-m mt-3">
											Filter
										</button>
									</div>
							</div>
						</form>
						</div>
							
						<!--  -->
						<div class="p-t-40">
							<h4 class="txt-m-101 cl3 p-b-37">
								Kategori
							</h4>

							<ul>
								@foreach ($categories as $category)
								<li class="p-b-5">
									<a href="/shop?category={{ $category->id }}" class="flex-sb-m flex-w txt-s-101 cl6 hov-cl10 trans-04 p-tb-3">
										<span class="m-r-10">
											{{ $category->name }}
										</span>

										<span>
											{{ $category->product_count }}
										</span>
									</a>
								</li>
								@endforeach

							</ul>
						</div>


						<!--  -->
						<div class="p-t-40">
							<h4 class="txt-m-101 cl3 p-b-37">
								Produk Terlaris
							</h4>

							<ul>
								@foreach ($topProducts as $topProduct)									
								<li class="flex-w flex-sb-t p-b-30">
									<a href="/detail/{{ $topProduct->product->id }}" class="size-w-50 wrap-pic-w bo-all-1 bocl12 hov8 trans-04">
										<img src="{{ asset('storage/' . $topProduct->product->image) }}" alt="IMG">
									</a>

									<div class="size-w-51 flex-col-l p-t-12">
										<a href="/detail/{{ $topProduct->product->id }}" class="txt-m-103 cl3 hov-cl10 trans-04 p-b-12">
											{{ $topProduct->product->name }}
										</a>

										<span class="txt-m-104 cl9">
											@currency($topProduct->product->price)
										</span>
									</div>
								</li>
								@endforeach

							</ul>
						</div>

					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-9 m-rl-auto p-b-50">
					<div>
						<div class="flex-w flex-r-m p-b-45 flex-row-rev">
							<span class="txt-s-101 cl9 m-r-30 size-w-53 ">
								<p>Menampilkan {{ $products->firstItem() }}–{{ $products->lastItem() }} dari {{ $products->total() }} hasil</p>
							</span>
						</div>


						@if (session()->has('success-add'))
							<div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<strong>Selamat!</strong> {{ session('success-add') }} <a href="/cart" class="text-success" style="text-decoration: underline"><strong>Keranjang</strong></a>
							</div>
						@endif

						<!-- Shop list -->
						<div class="shop-list">
							

							@if ($products->isEmpty())
								<h5 class="text-center">- Produk Tidak Ditemukan -</h5>
							@else
							@foreach ($products as $product)								
								<div class="row p-b-30">
									<div class=" col-sm-5 col-lg-4">
										<a href="/detail/{{ $product->id }}" class="wrap-pic-w bo-all-1 bocl12 hov8 trans-04">
											<img src="{{ asset('storage/' . $product->image) }}" alt="PRODUCT">
										</a>
									</div>

									<div class=" col-sm-7 col-lg-8">
										<div class="p-t-5 p-b-20">
											<div class="flex-w flex-sb-m">
												<a href="/detail/{{ $product->id }}" class="txt-m-120 cl3 hov-cl10 trans-04 m-r-20 js-name1 text-capitalize">
													{{ $product->name }}
												</a>
											</div>

											<span class="txt-m-117 cl9 text-success">
												@currency($product->price)
											</span>

											<p class="txt-s-101 cl6 p-t-18">
												{!! Str::limit($product->description, 150) !!}
											</p>

											
											<form action="{{ route('cart.add', $product->id) }}" method="POST">
											<div class="flex-w p-t-29">
													@csrf
												<div
													class="wrap-num-product flex-w flex-m bg12 p-rl-10 d-inline-flex align-items-center">
													<div class="btn-num-product-down flex-c-m fs-29"></div>
													<input class="txt-m-102 cl6 txt-center num-product" type="number"
														name="quantity" value="1">
													<div class="btn-num-product-up flex-c-m fs-16"></div>
													
												</div>
												<button href="https://wa.me/6288971698605" type="submit" class="text-white flex-c-m txt-s-103 cl0 bg10 size-a-2 hov-btn2 trans-04 ml-2 px-3">
													<img class="mr-2" src="/LP/assets/images/icons/icon-cart-3.png" alt="IMG">
													Tambah Kedalam Keranjang
												</button>
											</form>
											</div>	
										</div>
									</div>
								</div>
							@endforeach
							@endif

						</div>

						<!-- Custom Pagination -->
						<div class="flex-w flex-c-m p-t-47">
							{{-- Previous Page Link --}}
							@if ($products->onFirstPage())
								<span class="flex-c-m txt-s-115 cl6 size-a-24 how-btn1 bo-all-1 bocl15 trans-04 m-all-3 p-b-1">Previous</span>
							@else
								<a href="{{ $products->previousPageUrl() }}" class="flex-c-m txt-s-115 cl6 size-a-24 how-btn1 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3 p-b-1">Previous</a>
							@endif
				
							{{-- Pagination Elements --}}
							@foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
								@if ($page == $products->currentPage())
									<a href="{{ $url }}" class="flex-c-m txt-s-115 cl6 size-a-23 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3 active-pagi1">{{ $page }}</a>
								@else
									<a href="{{ $url }}" class="flex-c-m txt-s-115 cl6 size-a-23 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3">{{ $page }}</a>
								@endif
							@endforeach
				
							{{-- Next Page Link --}}
							@if ($products->hasMorePages())
								<a href="{{ $products->nextPageUrl() }}" class="flex-c-m txt-s-115 cl6 size-a-24 how-btn1 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3 p-b-1">
									Next
									<span class="lnr lnr-chevron-right m-t-3 m-l-7"></span>
									<span class="lnr lnr-chevron-right m-t-3"></span>
								</a>
							@else
								<span class="flex-c-m txt-s-115 cl6 size-a-24 how-btn1 bo-all-1 bocl15 trans-04 m-all-3 p-b-1 disabled" aria-disabled="true">
									Next
									<span class="lnr lnr-chevron-right m-t-3 m-l-7"></span>
									<span class="lnr lnr-chevron-right m-t-3"></span>
								</span>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection