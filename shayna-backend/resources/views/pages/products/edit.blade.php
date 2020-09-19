@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Barang</strong> <br>
            <small>{{ $item->name }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-lable">Nama Barang</label>
                    <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }}" class="form-control @error('name') is-invalid @enderror"/>
                    @error('name') <div class="text-muted">{{$message}}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="type" class="form-control-lable">Tipe Barang</label>
                    <input type="text" name="type" value="{{ old('type') ? old('type') : $item->type }}" class="form-control @error('type') is-invalid @enderror"/>
                    @error('name') <div class="text-muted">{{$message}}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-control-lable">Deskripsi Barang</label>
                    <textarea id="editor" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $item->description }}</textarea>
                    @error('name') <div class="text-muted">{{$message}}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="price" class="form-control-lable">Harga Barang</label>
                    <input type="number" name="price" value="{{ old('price') ? old('price') : $item->price }}" class="form-control @error('price') is-invalid @enderror"/>
                    @error('name') <div class="text-muted">{{$message}}</div>@enderror
                </div>


                <div class="form-group">
                    <label for="quantity" class="form-control-lable">Jumlah Barang</label>
                    <input type="number" name="quantity" value="{{ old('quantity') ? old('quantity') :  $item->quantity }}" class="form-control @error('quantity') is-invalid @enderror"/>
                    @error('name') <div class="text-muted">{{$message}}</div>@enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">
                        Ubah Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
