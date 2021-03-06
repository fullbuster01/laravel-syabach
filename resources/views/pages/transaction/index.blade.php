@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Transaksi Masuk</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>UUID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Nomer Hp</th>
                                        <th>Total Transaction</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php
                                        $no = $paginator->currentPage();
                                    @endphp --}}
                                    @forelse ($items as $item)
                                        <tr>
                                        <td>{{ $loop->iteration + ($items->currentPage() * 10 - 10) }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->uuid }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->number }}</td>
                                        <td>Rp. <span class="count">{{ $item->transaction_total }}</span></td>
                                        <td>
                                            @if ($item->transaction_status == 'PENDING')
                                                <span class="badge badge-info">
                                            @elseif ($item->transaction_status == 'SUCCESS')
                                                <span class="badge badge-success">
                                            @elseif ($item->transaction_status == 'FAILED')
                                                <span class="badge badge-danger">
                                            @else 
                                                <span>
                                            @endif
                                                {{ $item->transaction_status }}
                                                </span>
                                        </td>
                                        <td>
                                            {{-- @if ($item->transaction_status == "PENDING")
                                                <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                                <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-warning btn-sm"><i class="fa fa-times"></i></a>
                                            @endif --}}

                                            {{-- untuk lanjutan modal bisa dilihat pada bagian script --}}
                                            
                                            <a href="#mymodal" data-remote="{{ route('transactions.show', $item->id) }}" data-toggle="modal" data-target="#mymodal" data-title="Detail Transaksi <small>{{ $item->uuid }}</small>" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('transactions.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                            <form action="{{ route('transactions.destroy', $item->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingin menghapus')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center p-5">Data Tidak Tersedia</td>
                                        </tr>
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>
                {{-- ini untuk pagination --}}
                <div class="d-flex justify-content-center">
                    <div>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection