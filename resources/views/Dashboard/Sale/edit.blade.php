@extends('dashboard.layouts.main')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <form action="/dashboard/sale/{{ $sale->id }}" method="POST" class="needs-validation" novalidate>
                    @method('put')
                    @csrf
                    <h4 class="header-title">Tambah Kategori Baru</h4>
                    <p class="card-title-desc">Harap isi semua Form yang tersedia. Dan periksa kembali sebelum menyimpan
                    </p>

                    <div class="form-group row">
                        <label for="stock" class="col-md-2 col-form-label">Nama Produk</label>
                        <div class="col-md-10">
                            <select class="custom-select" required name="product_id">
                                <option selected disabled value="">Pilih Produk</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}" {{ $sale->product_id == $product->id ? 'selected' :
                                    '' }}>{{ $product->name }}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">
                                *Produk Tidak Boleh Kosong!
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="quantity" class="col-md-2 col-form-label">Jumlah Terjual</label>
                        <div class="col-md-10">
                            <input name="quantity" value="{{ old('quantity',$sale->quantity) }}" class="form-control"
                                type="text" placeholder="Masukan Jumlah Terjual" id="quantity" required>
                            <div class="invalid-feedback">
                                *Jumlah Terjual Tidak Boleh Kosong!
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_price" class="col-md-2 col-form-label">Total Pendapatan</label>
                        <div class="col-md-10">
                            <input name="total_price" value="{{ old('total_price',$sale->total_price) }}"
                                class="form-control" type="text" placeholder="Masukan Harga Produk" id="total_price"
                                required>
                            <div class="invalid-feedback">
                                *Total Pendapatan Tidak Boleh Kosong!
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="date" class="col-md-2 col-form-label">Tanggal Penjualan</label>
                        <div class="col-md-10">
                            <input required type="text" class="form-control datepicker-here" data-language="en"
                                name="date" value="{{ \Carbon\Carbon::parse($sale->date)->translatedFormat('m/d/Y') }}" autocomplete="off" />
                            <div class="invalid-feedback">
                                *Tanggal Tidak Boleh Kosong!
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
    document.getElementById('total_price').addEventListener('input', function(event) {
        // Remove any non-digit characters from the input value
        var inputVal = event.target.value.replace(/\D/g, '');
        // Parse the input value as an integer
        var intValue = parseInt(inputVal);
        // Format the integer value as currency and update the input value
        event.target.value = formatCurrency(intValue);
    });
</script>
@endsection