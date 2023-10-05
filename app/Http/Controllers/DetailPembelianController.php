<?php

namespace App\Http\Controllers;

use App\Models\detailPembelian;
use App\Http\Requests\StoredetailPembelianRequest;
use App\Http\Requests\UpdatedetailPembelianRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class detailPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $data['detailPembelian'] = detailPembelian::orderBy('created_at', 'DESC')->get();

        return view('detailPembelian.index')->with($data);
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
    public function store(StoredetailPembelianRequest $request)
    {
        //error handling
        try{
            DB::beginTransaction();  //mulai transaksi
            detailPembelian::create($request->all());  //query input ke tabel

            DB::commit();  //menyimpan data ke database

            //untuk merefresh ke halaman itu kembali untuk melihat hasil input
            return redirect('detailPembelian')->with('success', "Input data berhasil");
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();

            //$this->failResponse($error->getMessage(), $error->getCode());
        }
        // detailPembelian::create($request->all());
        // return redirect('detailPembelian')->with('success','Data detailPembelian berhasil ditambahkan');
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedetailPembelianRequest  $request
     * @param  \App\Models\detailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedetailPembelianRequest $request, detailPembelian $detailPembelian)
    {
        $detailPembelian->update($request->all());
        return redirect('detailPembelian')->with('success','Data detailPembelian berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detailPembelian  $detailPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(detailPembelian $detailPembelian)
    {
        try{
            DB::beginTransaction();
            $detailPembelian->delete();
            DB::commit();
            return redirect('detailPembelian')->with('success','Data detailPembelian berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }
}
