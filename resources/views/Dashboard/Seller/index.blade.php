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
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">Daftar Data Seller</h4>
                <p class="card-title-desc">Berikut adalah daftar data penjualan yang mencakup informasi tentang Nama Seller, 
                    Email dan informasi lainnya yang relevan.
                </p>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>E-mail</th>
                        <th>No. Handphone</th>
                        <th>Hak Akses</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->wa_number }}</td>
                                <td>
                                    @if ($user->is_seller === 1)
                                        <span class="badge badge-primary">Seller</span>
                                    @else
                                        <span class="badge badge-success">Buyer</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="/dashboard/user/{{ $user->id }}/edit"><i class="mdi mdi-file-edit text-primary" style="font-size: 150%"></i></a> 
                                        <span style="font-size: 100%">|</span>
                                    <button data-toggle="modal" data-target="#hapus{{ $user->id }}" class="border-0 bg-transparent"><i class="mdi mdi-trash-can text-danger" style="font-size: 150%"></i></button>
                                </td>
                            </tr>

                            {{-- Modal --}}
                            <div id="hapus{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <form action="/dashboard/user/{{ $user->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <div class="modal-dialog">
                                        <div class="modal-content border-0">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title mt-0 text-white" id="myModalLabel">Hapus Data Penjualan</h5>
                                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="font-size-16">Apakah kamu ingin menghapus <span class="text-danger">{{ $user->name }}</span>?</h5>
                                                <p>Data Penjualan yang telah dihapus akan hilang secara permanen dan tidak dapat dikembalikan lagi!</p>
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

                    
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div> 
@endsection