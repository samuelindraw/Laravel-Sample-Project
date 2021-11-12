@extends('layout.main')
@section('title', 'Fibonaci')
@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-10 mb-3">
                <form action="/teskecil/fibonaci" method="post" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="iterasi" class="form-label">Masukan Deret Iterasi</label>
                        <input type="text" class="form-control @error('iterasi') is-invalid @enderror" id="iterasi"
                            name="iterasi" value="{{ old('iterasi') ?? ($iterasi ?? '') }}">
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="w-25 btn btn-primary" name="cekiterasi">Cek</button>
                        <button type="submit" class="w-25 btn btn-danger" name="reset">Reset</button>
                    </div>
                </form>
                <br>
                <br>
                <div class="form-group">
                    <label for="hasil">HASIL</label>
                    <textarea class="form-control" id="hasil" name="hasil" rows="5">{{ old('hasil') ?? ($hasil ?? '') }}</textarea>
            </div>
        </div>
    </div>
</div>
@endsection
