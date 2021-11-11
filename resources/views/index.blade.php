@extends('layout.main')
@section('title', 'Calculator')
@section('container')

<div class="container">
    <div class="row">
        <div class="col-10 mb-3">
            <form action="/" method="post" class="mt-3">
                @csrf
                <div class="mb-3">
                  <label for="bil1" class="form-label">Bilangan 1</label>
                  <input type="text" class="form-control @error('bil1') is-invalid @enderror" id="bil1" name="bil1" value="{{ old('bil1') ?? $bil1 ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="operator" class="form-label">Operator (+, -, /, *)</label>
                    <select class="form-select" aria-label="Default select example" id="operator" name="operator">
                                    <option value="+" @isset($operator) @if ($operator === '+')
                                    selected
                                    @endif
                                @endisset>+</option>
                            <option value="-" @isset($operator) 
                            @if ($operator === '-')
                                selected
                                @endif
                            @endisset>-</option>
                        <option value="/" @isset($operator)
                         @if ($operator === '/')
                            selected
                            @endif
                        @endisset>/</option>
                    <option value="*" @isset($operator) @if ($operator === '*')
                        selected
                        @endif
                    @endisset>*</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="bil2" class="form-label">Bilangan 2</label>
                    <input type="text" class="form-control @error('bil2') is-invalid @enderror" id="bil2" name="bil2" value="{{ old('bil2') ?? $bil2 ?? '' }}">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="w-25 btn btn-primary" name="hitung">Hitung</button>
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