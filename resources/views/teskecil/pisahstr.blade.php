@extends('layout.main')
@section('title', 'Pisah STR')
@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-10 mb-3">
                <form action="/teskecil/pisahstr" method="post" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="kalimat" class="form-label">Masukan Kalimat</label>
                        <input type="text" class="form-control @error('kalimat') is-invalid @enderror" id="kalimat"
                            name="kalimat" value="{{ old('kalimat') ?? ($kalimat ?? '') }}">
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="w-25 btn btn-primary" name="cek">Cek</button>
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
