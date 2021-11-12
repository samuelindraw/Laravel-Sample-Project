@extends('layout.main')
@section('title', 'Jam Bertambah')
@section('container')

<div class="container">
    <div class="row">
        <div class="col-10 mb-3">
            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="/teskecil/jamtambah" method="post" class="mt-3">
                @csrf
                <div class="mb-3">
                    <label for="hari" class="form-label">Hari Awal</label>
                    <select class="form-select" aria-label="Default select example" id="hari" name="hari">
                        <option value='0' @isset($hari) @if ($hari == 0)
                            selected
                            @endif
                        @endisset>Senin</option>
                    <option value= '1' @isset($hari) @if ($hari == 1)
                        selected
                        @endif
                    @endisset>Selasa</option>
                <option value= '2' @isset($hari) @if ($hari == 2 )
                    selected
                    @endif
                @endisset>Rabu</option>
            <option value= '3' @isset($hari) @if ($hari == 3) 
                selected
                @endif
            @endisset>Kamis</option>
            <option value= '4' @isset($hari) @if ($hari == 4) 
            selected
            @endif
        @endisset>Jumat</option>
        <option value='5' @isset($hari) @if ($hari == 5) 
        selected
        @endif
    @endisset>Sabtu</option>
    <option value='6' @isset($hari) @if ($hari == 6) 
        selected
        @endif
    @endisset>Minggu</option>
                </select>
            </div>
                <br>
                <div class="form-group">
                    <label for="jamawal" class="form-label">Jam awal</label>
                    <input type="number" class="form-control @error('jamawal') is-invalid @enderror" id="jamawal" name="jamawal" value="{{ old('jamawal') ?? $jamawal ?? '' }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="jamtambah" class="form-label">jam tambah</label>
                    <input type="number" class="form-control @error('jamtambah') is-invalid @enderror" id="jamtambah" name="jamtambah" value="{{ old('jamtambah') ?? $jamtambah ?? '' }}">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="w-25 btn btn-primary" name="cekjam">Menjadi</button>
                    <button type="submit" class="w-25 btn btn-danger" name="reset" >Reset</button>
                </div>
            </form>
            <div class="form-group">
                <label for="hasil">HASIL</label>
                <input type="text" class="form-control" id="hasil" name="hasil" value="{{ old('hasil') ?? $hasil ?? '' }}">
            </div>
        </div>
    </div>
</div>
@endsection