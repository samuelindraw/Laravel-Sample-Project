@extends('layout.main')
@section('title', 'Counter')
@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-10 mb-3">
                <form action="/teskecil/counter" method="post" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="counter" class="form-label">Masukan Deret Iterasi</label>
                        <input type="text" class="form-control @error('counter') is-invalid @enderror" id="counter"
                            name="counter" value="{{ old('counter') ?? ($counter ?? '') }}">
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="nilaiawal" class="form-label">Masukan nilaiawal</label>
                        <input type="text" class="form-control @error('nilaiawal') is-invalid @enderror" id="nilaiawal"
                            name="nilaiawal" value="{{ old('nilaiawal') ?? ($nilaiawal ?? '') }}">
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="w-25 btn btn-primary" name="cekcounter">Cek</button>
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
