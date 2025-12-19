<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

    $total = collect($cart)->sum(function ($item) {
        return $item['harga'] * $item['qty'];
    });

    return view('pelanggan.cart', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $menu = Menu::findOrFail($request->menu_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$menu->id])) {
            $cart[$menu->id]['qty']++;
        } else {
            $cart[$menu->id] = [
                'menu_id'  => $menu->id,
                'nama'     => $menu->nama_menu,
                'harga'    => $menu->harga,
                'qty'      => 1,
                'subtotal' => $menu->harga,
            ];
        }

        $cart[$menu->id]['subtotal'] =
            $cart[$menu->id]['qty'] * $menu->harga;

        session()->put('cart', $cart);

        return back()->with('success', 'Menu ditambahkan');
    }

    public function update(Request $request)
    {
        $cart = session('cart', []);

        if (isset($cart[$request->menu_id])) {
            $cart[$request->menu_id]['qty'] = max(1, $request->qty);
            $cart[$request->menu_id]['subtotal'] =
                $cart[$request->menu_id]['qty'] * $cart[$request->menu_id]['harga'];
        }

        session()->put('cart', $cart);

        return back();
    }

    public function remove(Request $request)
    {
        $cart = session('cart', []);
        unset($cart[$request->menu_id]);

        session()->put('cart', $cart);

        return back();
    }
}
