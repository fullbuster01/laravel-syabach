<?php

namespace App\Http\Controllers\API;

use App\Admin\Transaction;
use App\Http\Controllers\Api\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function get(Request $request, $id){
        $product = Transaction::with(['details.product'])->find($id);

        if($product)
            return ResponseFormatter::success($product, 'Data transaksi berhasil diambil');
        else
            return ResponseFormatter::error(null, 'Data transaksi tidak ada');
    }
}
