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
    
                        <a href="shop-product-grid.html" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
                            / Products
                        </a>
    
                        <a href="#" class="txt-m-201 cl0 hov-cl10 trans-04 m-r-6">
                            / Vegetables
                        </a>
    
                        <span>
                            / Products
                        </span>
                    </span>
                </div>
            </div>
        </section>


		<!-- Product detail -->
		<section class="sec-product-detail bg0 p-t-105 p-b-70">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-lg-6">
						<div class="m-r--30 m-r-0-lg">
							<!-- Slide 100 -->
							<div id="slide100-01">
								<div class="wrap-main-pic-100 bo-all-1 bocl12 pos-relative">
									<div class="main-frame">
										<div class="wrap-main-pic">
											<div class="main-pic">
												<img src="{{ asset('storage/' . $product->image) }}" alt="IMG-SLIDE">
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="col-md-5 col-lg-6">
						<div class="p-l-70 p-t-35 p-l-0-lg">
							<h4 class="js-name1 txt-l-104 cl3 p-b-16">
								{{ $product->name }}
							</h4>

							<span class="txt-m-117 cl9 text-success">
								@currency($product->price)
							</span>
							
							
							<p class="txt-s-101 cl6 mt-5">
								{!! $product->description !!}
							</p>

							<br>

							@if (session()->has('success-add'))
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<strong>Selamat!</strong> {{ session('success-add') }} <a href="/cart" class="text-success" style="text-decoration: underline"><strong>Keranjang</strong></a>
								</div>
							@endif
							

							<div class="flex-w flex-m p-b-30">
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
									</div>
									</form>
									
							</div>

							<div class="txt-s-107 p-b-6">
								<span class="cl6">
									Stok: 
								</span>

								<span class="cl9">
									{{ $product->stock }}
								</span>
							</div>

							<div class="txt-s-107 p-b-6">
								<span class="cl6">
									Kategori:
								</span>

								<a href="/shop?category={{ $product->category->id }}">
									<span class="cl9">
										{{ $product->category->name }}
									</span>
								</a>
							</div>
							<div class="flex-w flex-m">
								@if($latest_csv)
								<button id="csv_btn" type="button" class="text-white flex-c-m txt-s-103 cl0 bg10 size-a-2 hov-btn2 trans-04 px-3"  data-toggle="collapse" data-target="#collapseExample">								
									Lihat {{$latest_csv -> data_type}}
								</button>
								@endif
								@if($latest_image)
								<button id="image_btn" type="button" class="text-white ml-2 flex-c-m txt-s-103 cl0 bg10 size-a-2 hov-btn2 trans-04 px-3"  data-toggle="collapse" data-target="#collapseExample">								
									Lihat {{$latest_image -> data_type}}
								</button>
								@endif								
							</div>
							@if($latest_csv || $latest_image)
								<div class="collapse" id="collapseExample">
									<div class="card card-body">
										<div id="content_div">dpakdjak</div>
									</div>
								</div>
							@endif

						</div>
					</div>
				</div>


			</div>
		</section>


	<!-- Related product -->
	<section class="sec-related bg0 p-b-85">
		<div class="container">
			<!-- slide9 -->
			<div class="wrap-slick9">
				<div class="flex-w flex-sb-m p-b-33 p-rl-15">
					<h3 class="txt-l-112 cl3 m-r-20 respon1 p-tb-15">
						PRODUK DENGAN KATEGORI YANG SAMA
					</h3>

					<div class="wrap-arrow-slick9 flex-w m-t-6"></div>
				</div>

				<div class="slick9">
					<!-- - -->
					@foreach ($relatedProducts as $relatedProduct)						
					<div class="item-slick9 p-all-15">
						<!-- Block1 -->
						<div class="block1">
							<div class="block1-bg wrap-pic-w bo-all-1 bocl12 hov3 trans-04">
								<img height="200px" src="{{ asset('storage/' . $relatedProduct->image) }}" alt="IMG">
							</div>
							<br>
							<br>
							<br>
							<div class="block1-content flex-col-c-m">
								<a href="product-single.html" class="txt-m-103 cl3 txt-center hov-cl10 trans-04 js-name-b1">
									{{ $relatedProduct->name }}
								</a>

								<span class="block1-content-more txt-m-104 cl9 p-t-21 trans-04 text-success">
									@currency($relatedProduct->price)
								</span>

								<div class="block1-wrap-icon flex-c-m flex-w trans-05">
									<a href="/detail/{{ $relatedProduct->id }}" class="block1-icon flex-c-m wrap-pic-max-w">
										<img src="/LP/assets/images/icons/icon-view.png" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
	</section>

	<script>
		let clickedView = '';
		const server_blockchain = 'http://127.0.0.1:5000'
		let url_blockchain = server_blockchain + '/get_text_by_hash';
	
		function loadData(data_type){

			let latest_csv_hash = '{{$latest_csv -> transaction_hash}}';
			let latest_image_hash = '{{$latest_image -> transaction_hash}}';

			let selected_hash; 

			if(data_type == 'csv'){
				selected_hash = latest_csv_hash;
						
			}else if(data_type == 'image'){
				selected_hash = latest_image_hash;

			}	
		
			$.ajax({
				url: url_blockchain,
				type: 'GET',
				data: {
					'hash' : selected_hash
				},
				success: function(response) {
					console.log(response);	
					if(data_type == 'csv'){
						
					}else if(data_type == 'image'){
	
					}				
	
				},error: function(xhr, status, error) {
					console.error('AJAX Error: ' + status + error);
				} 
			});
	
			
		}
	
		$(document).ready(function() {
	
			$('#csv_btn').click(function(){
				clickedView = 'csv';
				loadData(clickedView);
			});
	
			$('#image_btn').click(function(){
				clickedView = 'image';
				loadData(clickedView);
			});
	
		});

	
	</script>
	
	

@endsection