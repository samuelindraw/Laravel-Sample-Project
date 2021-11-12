@extends('layout.main')
@section('title', 'Calculator')
@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-10 mb-3">
                <form action="/teskecil/hitungabjad" method="post" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="bilangan" class="form-label">Bilangan</label>
                        <input type="text" class="form-control @error('bilangan') is-invalid @enderror" id="bilangan" name="bilangan"
                            value="{{ old('bilangan') ?? ($bilangan ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="operator" class="form-label">Hitung Abjad dalam kalimat</label>
                        <select class="form-select" aria-label="Default select example" id="abj" name="abj">
                            <option value="A" @isset($abj) @if ($abj === 'A')
                                selected
                                @endif
                            @endisset>A</option>
                        <option value="I" @isset($abj) @if ($abj === 'I')
                            selected
                            @endif
                        @endisset>I</option>
                    <option value="U" @isset($abj) @if ($abj === 'U')
                        selected
                        @endif
                    @endisset>U</option>
                <option value="E" @isset($abj) @if ($abj === 'E')
                    selected
                    @endif
                @endisset>E</option>
        </select>
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
    <input type="text" class="form-control" id="hasil" name="hasil"
        value="{{ old('hasil') ?? ($hasil ?? '') }}">
</div>
</div>
</div>
</div>
@endsection
