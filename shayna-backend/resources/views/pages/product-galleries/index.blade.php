@extends('layouts.default')


@section('content')
   <div class="orders">
       <div class="card">
           <div class="card-header">
            <h4 class="box-title">Daftar Foto</h4>
           </div>
           <div class="card-body--">
            <div class="table-stats order-table ov-h">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Foto</th>
                            <th>Deafult</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>
                                    <img src="{{ url($item->photo) }}" alt="">
                                </td>
                                <td>{{ $item->is_default ? 'Ya' : 'Tidak' }}</td>

                                <td>
                                    <form action="{{ route('products-galleries.destroy',$item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td class="text-center p-5" colspan="5">
                                <h3>Data Tidak Tersedia</h3>
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
           </div>
       </div>
   </div>
@endsection
