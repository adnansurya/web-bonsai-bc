<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            // Jika produk sudah ada di keranjang, tambahkan jumlahnya
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Jika produk belum ada di keranjang, tambahkan produk baru ke keranjang
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->back()->with('success-add', 'Produk Berhasil Ditambahkan Ke dalam');
    }

    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        return view('LP.cart', compact('cartItems','total'));
    }

    public function removeFromCart($cartItemId)
    {
        $cartItem = Cart::where('id', $cartItemId)->where('user_id', Auth::id())->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->back()->with('delete', 'Produk Berhasil Dihapus dari');
    }


    public function showCheckout() {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('LP.checkout', compact('cartItems','total'));
    }

    public function checkout(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        $user = Auth::user();
        $name = $request->input('name');
        $alamat = $request->input('alamat');
        $nomorHandphone = $request->input('nomor');
        $email = $request->input('email');
        $note = $request->input('note');

        $orderDetails = "";
        foreach ($cartItems as $item) {
            $orderDetails .= "{$item->product->name} ({$item->quantity}) - Rp " . number_format($item->product->price, 0, ',', '.') . "\n";
        }

        $message = "Saya ingin melakukan Pembayaran,\n\nNama : $name\nE-mail : $email\nNomor Handphone : $nomorHandphone\nAlamat : $alamat\nCatatan : $note\n----------------------------------------------------\nPesanan : \n$orderDetails----------------------------------------------------\nTotal : Rp " . number_format($total, 0, ',', '.') . "\n\nTerima kasih.";

        // WhatsApp link
        $phone = "628971871723"; // Ganti dengan nomor WhatsApp tujuan
        $whatsAppUrl = "https://wa.me/$phone?text=" . urlencode($message);

        return redirect()->away($whatsAppUrl);
    }
}
