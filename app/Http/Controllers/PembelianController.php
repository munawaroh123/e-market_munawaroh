<?php

namespace App\Http\Controllers;

use App\Models\pembelian;
use App\Http\Requests\StorepembelianRequest;
use App\Http\Requests\UpdatepembelianRequest;
use App\Models\Pemasok;
use App\Models\barang;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class pembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastId = Pembelian::select('kode_masuk')->orderBy('created_at', 'desc')->first();
        $data['kode'] = ($lastId== null?`P00000001` :sprintf('P%08d', substr($lastId->kode_masuk,1)+1));
        $data['pemasok']= Pemasok::get();
        $data['barang']= Barang::get();

    return view('pembelian/index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StorepembelianRequest $request)
    {
        //error handling
        try{
            DB::beginTransaction();  //mulai transaksi
            pembelian::create($request->all());  //query input ke tabel

            DB::commit();  //menyimpan data ke database

            //untuk merefresh ke halaman itu kembali untuk melihat hasil input
            return redirect('pembelian')->with('success', "Input data berhasil");
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();

            //$this->failResponse($error->getMessage(), $error->getCode());
        }
        // pembelian::create($request->all());
        // return redirect('pembelian')->with('success','Data pembelian berhasil ditambahkan');
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepembelianRequest  $request
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepembelianRequest $request, pembelian $pembelian)
    {
        $pembelian->update($request->all());
        return redirect('pembelian')->with('success','Data pembelian berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(pembelian $pembelian)
    {
        try{
            DB::beginTransaction();
            $pembelian->delete();
            DB::commit();
            return redirect('pembelian')->with('success','Data pembelian berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }
}
