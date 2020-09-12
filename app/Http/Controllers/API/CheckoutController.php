<?php

namespace App\Http\Controllers\Api;

use App\Admin\Product;
use App\Admin\Transaction;
use App\Admin\TransactionDetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 9999);

        $transaction = Transaction::create($data);

        foreach ($request->transaction_details as $product) {
            $details[] = new TransactionDetail([
                'transactions_id' => $transaction->id,
                'products_id' => $product
            ]);

            // ini untuk mengurangi stok barang/quantity
            Product::find($product)->decrement('quantity');
        }

        // details() ini merupakan relasi yang ada di model
        $transaction->details()->saveMany($details);
        
        return ResponseFormatter::success($transaction);
    }
}
