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
    
    @foreach ($categories as $category)
    <div class="col-md-6 col-xl-3">
        <div class="card card-body">
            <h4 class="card-title font-size-16 mt-0">{{ $category->name }}</h4>
            <p class="card-text">{!! Str::limit($category->description, 100) !!}</p>
            <a href="/dashboard/category/{{ $category->id }}/edit" class="btn btn-rounded btn-primary waves-effect waves-light mb-2">Edit</a>
            <button data-toggle="modal" data-target="#hapus{{ $category->id }}" class="btn btn-danger btn-rounded waves-effect waves-light">Hapus</button>
        </div>
    </div>


    {{-- Modal --}}
    <div id="hapus{{ $category->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form action="/dashboard/category/{{ $category->id }}" method="POST">
            @method('delete')
            @csrf
            <div class="modal-dialog">
                <div class="modal-content border-0">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title mt-0 text-white" id="myModalLabel">Hapus Kategori</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5 class="font-size-16">Apakah kamu yakin ingin menghapus <span class="text-danger">{{ $category->name }}</span>?</h5>
                        <p>Kategori yang telah dihapus akan hilang secara permanen serta <b>menghilangkan seluruh Produk</b> yang terkait dan tidak dapat dikembalikan lagi!</p>
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