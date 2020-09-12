@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Ubah Transaksi</strong>
        <small>{{ $item->uuid }}</small>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('transactions.update', $item->id) }}" method="post">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label">Nama Pemesan</label>
                <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }}" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="form-control-label">Email</label>
                <input type="email" name="email" value="{{ old('email') ? old('email') : $item->email }}" class="form-control @error('email') is-invalid @enderror" required>
                @error('email')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="number" class="form-control-label">Nomer Hp</label>
                <input type="number" name="number" value="{{ old('price') ? old('number') : $item->number }}" class="form-control @error('number') is-invalid @enderror" required>
                @error('number')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address" class="form-control-label">Alamat Pemesan</label>
                <input type="text" name="address" value="{{ old('address') ? old('address') : $item->address }}" class="form-control @error('address') is-invalid @enderror" required>
                @error('address')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
    </div>
</div>
@endsection