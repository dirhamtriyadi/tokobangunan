<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanHasProduk;

class PenjualanHasProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualanhasproduk = PenjualanHasProduk::all();
        return view('penjualan_has_produk.index', ['penjualanhasproduk' => $penjualanhasproduk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = \App\Models\Produk::all();
        $penjualan = \App\Models\Penjualan::all();
        return view('penjualan_has_produk.create', ['produk' => $produk, 'penjualan' => $penjualan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penjualan_id' => 'required',
            'produk_id' => 'required',
            'qty' => 'required|numeric'
        ], [
            'penjualan_id.required' => 'Penjualan harus diisi',
            'produk_id.required' => 'Produk harus diisi',
            'qty.required' => 'Qty harus diisi',
            'qty.numeric' => 'Qty harus berupa angka'
        ]);

        if (!$request->id) {
            # code...
            if ($request->qty) {
                $produk = \App\Models\Produk::findOrFail($request->produk_id);
                $produk->save();
                if ($produk->stok < $request->qty) {
                    return redirect()->route('penjualanhasproduk.create')->with('error', 'Stok tidak cukup');
                }
                $produk->stok -= $request->qty;
                $produk->save();
            }

            $harga = $produk->harga * $request->qty;

            PenjualanHasProduk::updateOrCreate(
                [
                    'id' => $request->id
                ], $validatedData);
            return redirect()->route('penjualanhasproduk');
        }
        $qtyPEnjualanHasProduk = PenjualanHasProduk::find($request->id);
        if ($request->qty) {
            $produk = \App\Models\Produk::findOrFail($request->produk_id);
            $produk->stok += $qtyPEnjualanHasProduk->qty;
            $produk->save();
            if ($produk->stok < $request->qty) {
                return redirect()->route('penjualanhasproduk.create')->withErrors('error', 'Stok tidak cukup');
            }
            $produk->stok -= $request->qty;
            $produk->save();
        }

        $harga = $produk->harga * $request->qty;

        PenjualanHasProduk::updateOrCreate(
            [
                'id' => $request->id
            ], $validatedData);
        return redirect()->route('penjualanhasproduk');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penjualanhasproduk = PenjualanHasProduk::findOrFail($id);
        return view('penjualan_has_produk.edit', ['penjualanhasproduk' => $penjualanhasproduk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PenjualanHasProduk::destroy($id);
    }
}
