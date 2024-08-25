@extends('dashboard.layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form action="/dashboard/product" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                @csrf
                    <h4 class="header-title">Tambah Produk Baru</h4>
                    <p class="card-title-desc">Harap isi semua Form yang tersedia. Dan periksa kembali sebelum menyimpan</p>

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Nama Produk</label>
                        <div class="col-md-10">
                            <input name="name" value="{{ old('name') }}" class="form-control" type="text" placeholder="Masukan Nama Kategori" id="name" required>
                            <div class="invalid-feedback">
                                *Nama Produk Tidak Boleh Kosong!
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-md-2 col-form-label">Harga</label>
                        <div class="col-md-10">
                            <input name="price" value="Rp 0" class="form-control" type="text" placeholder="Masukan Harga Produk" id="price" required>
                            <div class="invalid-feedback">
                                *Harga Tidak Boleh Kosong!
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stock" class="col-md-2 col-form-label">Stok</label>
                        <div class="col-md-10">
                            <input name="stock" value="{{ old('stock') }}" class="form-control" type="text" placeholder="Masukan Stok Produk" id="stock" required>
                            <div class="invalid-feedback">
                                *Harga Tidak Boleh Kosong!
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="stock" class="col-md-2 col-form-label">Kategori</label>
                        <div class="col-md-10">
                            <select class="custom-select" required name="category_id">
                                <option selected disabled value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                                *Kategori Tidak Boleh Kosong!
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="stock" class="col-md-2 col-form-label">Gambar Produk</label>
                        <div class="col-md-10">
                            <input type="file" name="image" id="image" onchange="previewGambar(event)">

                            <div class="invalid-feedback">
                                *Kategori Tidak Boleh Kosong!
                            </div>

                            <div id="previewContainer" class="mb-3 mt-3" style="display: none;">
                                <h5 for="">Preview Gambar :</h5>
                                <img id="previewImage" src="#" alt="Preview Gambar" style="max-width: 100%; max-height: 200px;">
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


<script>
    // Function to format currency
    function formatCurrency(amount) {
        // Format the number with currency symbol and thousand separator
        return 'Rp ' + amount.toFixed(0).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    }

    // Add event listener to input field
    document.getElementById('price').addEventListener('input', function(event) {
        // Remove any non-digit characters from the input value
        var inputVal = event.target.value.replace(/\D/g, '');
        // Parse the input value as an integer
        var intValue = parseInt(inputVal);
        // Format the integer value as currency and update the input value
        event.target.value = formatCurrency(intValue);
    });
</script>

<script>
    function previewGambar(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var preview = document.getElementById('previewImage');
            preview.src = reader.result;
            document.getElementById('previewContainer').style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
</script>
@endsection

