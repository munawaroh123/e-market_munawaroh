<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $data['produk'] = Produk::orderBy('created_at', 'DESC')->get();

        return view('produk.index')->with($data);
        }
        catch(QueryException | Exception | PDOException $error){
            return "terjadi kesalahan" .$error->getMessage();

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdukRequest $request)
    {
        //error handling
        try{
            DB::beginTransaction();  //mulai transaksi
            Produk::create($request->all());  //query input ke tabel

            DB::commit();  //menyimpan data ke database

            //untuk merefresh ke halaman itu kembali untuk melihat hasil input
            return redirect('produk')->with('success', "Input data berhasil");
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();

            //$this->failResponse($error->getMessage(), $error->getCode());
        }
        // Produk::create($request->all());
        // return redirect('produk')->with('success','Data produk berhasil ditambahkan');
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdukRequest  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        $produk->update($request->all());
        return redirect('produk')->with('success','Data produk berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        try{
            DB::beginTransaction();
            $produk->delete();
            DB::commit();
            return redirect('produk')->with('success','Data produk berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }
}
