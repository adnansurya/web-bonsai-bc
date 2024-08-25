@extends('dashboard.layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form action="/dashboard/category" method="POST" class="needs-validation" novalidate>
                @csrf
                    <h4 class="header-title">Tambah Kategori Baru</h4>
                    <p class="card-title-desc">Harap isi semua Form yang tersedia. Dan periksa kembali sebelum menyimpan</p>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Nama Kategori</label>
                        <div class="col-md-10">
                            <input name="name" value="{{ old('name') }}" class="form-control" type="text" placeholder="Masukan Nama Kategori" id="name" required>
                            <div class="invalid-feedback">
                                *Nama Kategori Tidak Boleh Kosong!
                            </div>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="elm1" class="col-md-2 col-form-label">Deskripsi</label>
                        <div class="col-md-10">
                            <textarea required id="elm1" name="description">{{ old('description') }}</textarea>
                            <div class="invalid-feedback">
                                *Deskripsi Tidak Boleh Kosong!
                            </div>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right mt-5">Simpan</button>
                </form>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>
@endsection