@extends('layout.main')
@section('title', "{{ $title }}")
@section('container')

<div class="container">
    <div class="row">
        <div class="col-10 mb-3">
            <form action="/editData" method="post" class="mt-3">
                 @csrf
                <input type="hidden" class="form-control" name="id" value="{{ $bahans->id }}"
                style="text-transform: uppercase">
                <div class="mb-3">
                  <label for="part_number" class="form-label">Part Number</label>
                  <input type="text" class="form-control @error('part_number') is-invalid @enderror" id="part_number" name="part_number" value="{{ $bahans->part_number }}" placeholder="Part Number"
                  style="text-transform: uppercase">
                  @error('part_number')
                  <div class="invalid-feedback">
                     {{$message}}
                  </div>
                  @enderror
                </div>
                <br>
                <div class="form-group">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $bahans->name }}"
                    placeholder="Part Name" style="text-transform: capitalize;">
                    @error('name')
                    <div class="invalid-feedback">
                       {{$message}}
                    </div>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <label for="um" class="form-label">UM</label>
                    <input type="text" class="form-control @error('um') is-invalid @enderror" id="um" name="um" value="{{ $bahans->um }}">
                    @error('um')
                    <div class="invalid-feedback">
                       {{$message}}
                    </div>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="w-25 btn btn-primary" name="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection