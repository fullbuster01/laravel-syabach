
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <td>{{ $item->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $item->email }}</td>
        </tr>
        <tr>
            <th>Nomer Hp</th>
            <td>{{ $item->number }}</td>
        </tr>
        <tr>
            <th>alamat</th>
            <td>{{ $item->address }}</td>
        </tr>
        <tr>
            <th>Total Transaksi</th>
            <td>{{ $item->transaction_total }}</td>
        </tr>
        <tr>
            <th>Status Transaksi</th>
            <td>{{ $item->transaction_status }}</td>
        </tr>
        <tr>
            <th>Pembelian Produk</th>
            <td>
                <table class="table table-bordered w-100">
                    <tr>
                        <th>Nama</th>
                        <th>Type</th>
                        <th>Harga</th>
                    </tr>
                    @foreach ($item->details as $detail)
                        <td>{{ $detail->product->name }}</td>
                        <td>{{ $detail->product->type }}</td>
                        <td>Rp. {{ $detail->product->price }}</td>
                    @endforeach
                </table>
            </td>
        </tr>
    </table>

    <div class="row">
        <div class="col-4">
            <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-block"><i class="fa fa-check">Set Sukses</i></a>
        </div>
        <div class="col-4">
            <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-warning btn-block"><i class="fa fa-times">Set Failed</i></a>
        </div>
        <div class="col-4">
            <a href="{{ route('transactions.status', $item->id) }}?status=PENDING" class="btn btn-info btn-block"><i class="fa fa-spinner">Set Pending</i></a>
        </div>
    </div>

