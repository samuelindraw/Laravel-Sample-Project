@extends('layout.main')
@section('title', 'Cek Tahun')
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
            <form action="/teskecil/cekkalender" method="post" class="mt-3">
                @csrf
                <div class="mb-3">
                  <label for="tanggal" class="form-label">Tanggal</label>
                  <input type="number" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') ?? $tanggal ?? '' }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="bulan" class="form-label">Bulan</label>
                    <input type="number" class="form-control @error('bulan') is-invalid @enderror" id="bulan" name="bulan" value="{{ old('bulan') ?? $bulan ?? '' }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun') ?? $tahun ?? '' }}">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="w-25 btn btn-primary" name="cekkalender">cek tahun</button>
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