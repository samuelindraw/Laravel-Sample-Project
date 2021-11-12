@extends('layout.main')
@section('title', 'Bintang Pyramid')
@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-10 mb-3">
                <form action="/teskecil/bintang" method="post" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="angka" class="form-label">Input</label>
                        <input type="text" class="form-control @error('angka') is-invalid @enderror" id="angka"
                            name="angka" value="{{ old('angka') ?? ($angka ?? '') }}">
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="w-25 btn btn-primary" name="cekangka">Cekangka</button>
                        <button type="submit" class="w-25 btn btn-danger" name="reset">Reset</button>
                    </div>
                </form>
                <br>
                <br>
                <div class="form-group">
                    <label for="hasil">HASIL</label>
                    <textarea class="form-control" id="hasil" name="hasil" rows="10">{{ old('hasil') ?? ($hasil ?? '') }}</textarea>
            </div>
        </div>
    </div>
</div>
@endsection
