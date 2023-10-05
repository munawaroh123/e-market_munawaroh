<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Http\Requests\StorebarangRequest;
use App\Http\Requests\UpdatebarangRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $data['barang'] = barang::orderBy('created_at', 'DESC')->get();

        return view('barang.index')->with($data);
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
    public function store(StorebarangRequest $request)
    {
        //error handling
        try{
            DB::beginTransaction();  //mulai transaksi
            barang::create($request->all());  //query input ke tabel

            DB::commit();  //menyimpan data ke database

            //untuk merefresh ke halaman itu kembali untuk melihat hasil input
            return redirect('barang')->with('success', "Input data berhasil");
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();

            //$this->failResponse($error->getMessage(), $error->getCode());
        }
        // barang::create($request->all());
        // return redirect('barang')->with('success','Data barang berhasil ditambahkan');
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebarangRequest  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebarangRequest $request, barang $barang)
    {
        $barang->update($request->all());
        return redirect('barang')->with('success','Data barang berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
        try{
            DB::beginTransaction();
            $barang->delete();
            DB::commit();
            return redirect('barang')->with('success','Data barang berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }
}
