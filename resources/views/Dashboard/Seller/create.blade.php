@extends('dashboard.layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form action="/dashboard/user" method="POST" class="needs-validation" novalidate>
                @csrf
                    <h4 class="header-title">Tambah Data Seller Baru</h4>
                    <p class="card-title-desc">Harap isi semua Form yang tersedia. Dan periksa kembali sebelum menyimpan</p>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Nama Lengkap</label>
                        <div class="col-md-10">
                            <input name="name" value="{{ old('name') }}" class="form-control" type="text" placeholder="Masukan Nama Lengkap" id="name" required>
                            <div class="invalid-feedback">
                                *Nama Lengkap Tidak Boleh Kosong!
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">E-mail</label>
                        <div class="col-md-10">
                            <input name="email" value="{{ old('email') }}" class="form-control" type="email" placeholder="Masukan Email" id="email" required>
                            <div class="invalid-feedback">
                                *E-mail Tidak Boleh Kosong!
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="wa_number" class="col-md-2 col-form-label">Masukan Nomor Handphone</label>
                        <div class="col-md-10">
                            <input name="wa_number" value="{{ old('wa_number') }}" class="form-control" type="text" placeholder="Masukan Nomor Handphone" id="wa_number" required>
                            <div class="invalid-feedback">
                                *Nomor Handphone Tidak Boleh Kosong!
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label">Masukan Password</label>
                        <div class="col-md-10">
                            <input name="password" value="{{ old('password') }}" class="form-control" type="password" placeholder="Masukan Password" id="password" required>
                            @error('password')
                                <p class="text-danger">*{{ $message }}</p>
                            @enderror
                            <div class="invalid-feedback">
                                *Password Tidak Boleh Kosong!
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stock" class="col-md-2 col-form-label">Hak Akses</label>
                        <div class="col-md-10">
                            <select class="custom-select" required name="is_seller">
                                <option selected disabled value="">Pilih Hak Akses</option>
                                <option value="1">Seller</option>
                                <option value="0">Buyer</option>
                            </select>

                            <div class="invalid-feedback">
                                *Hak Akses Tidak Boleh Kosong!
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