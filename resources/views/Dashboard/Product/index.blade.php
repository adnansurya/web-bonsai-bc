@extends('dashboard.layouts.main')


@section('content')

@if (session()->has('success'))
<div class="alert alert-primary alert-dismissible fade show mb-3" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Selamat!</strong> {{ session('success') }}
</div>
@endif

@if (session()->has('success-edit'))
<div class="alert alert-info alert-dismissible fade show mb-3" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Selamat!</strong> {{ session('success-edit') }}
</div>
@endif

@if (session()->has('delete'))
<div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Selamat!</strong> {{ session('delete') }}
</div>
@endif


<div class="row">
    @foreach ($products as $product)
    <div class="col-md-6 col-xl-3">
        <div class="card">
            @if ($product->image == 'jpg')
                <img class="card-img-top img-fluid" src="/Dashboard/assets/images/small/img-1.jpg" alt="Card image cap">
            @else
                <img class="card-img-top img-fluid" src="{{ asset('storage/' . $product->image) }}" style="height: 190px;object-fit: cover;" alt="Card image cap">
            @endif
            <div class="card-body">
                <h4 class="mb-1 pb-0 card-title font-size-16 mt-0">{{ $product->name }} (<span class="text-primary">@currency($product->price))</span></h4>
                <p class="text-secondary text-small mt-0 pt-0" style="font-size: 13px">{{ $product->category->name }}</p>
                <p class="card-text">{!! Str::limit($product->description, 40) !!}</p>
                <a href="/dashboard/product/{{ $product->id }}/edit" class="btn btn-primary btn-rounded waves-effect waves-light">Edit</a>
                <button data-toggle="modal" data-target="#hapus{{ $product->id }}" class="btn btn-danger btn-rounded waves-effect waves-light">Hapus</button>
            </div>

            
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="text-primary">Stok :</span> {{ $product->stock }}</li>
            </ul>
        </div>
    </div>


    {{-- Modal --}}
    <div id="hapus{{ $product->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form action="/dashboard/product/{{ $product->id }}" method="POST">
            @method('delete')
            @csrf
            <div class="modal-dialog">
                <div class="modal-content border-0">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title mt-0 text-white" id="myModalLabel">Hapus Produk</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="font-size-16">Apakah kamu yakin ingin menghapus <span class="text-danger">{{ $product->name }}</span>?</h5>
                        <p>Produk yang telah dihapus akan hilang secara permanen dan tidak dapat dikembalikan lagi!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light">Hapus</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endforeach


</div>
@endsection