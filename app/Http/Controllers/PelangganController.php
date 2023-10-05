<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $data['pelanggan'] = pelanggan::orderBy('created_at', 'DESC')->get();

        return view('pelanggan.index')->with($data);
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
    public function store(StorepelangganRequest $request)
    {
        //error handling
        try{
            DB::beginTransaction();  //mulai transaksi
            pelanggan::create($request->all());  //query input ke tabel

            DB::commit();  //menyimpan data ke database

            //untuk merefresh ke halaman itu kembali untuk melihat hasil input
            return redirect('pelanggan')->with('success', "Input data berhasil");
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();

            //$this->failResponse($error->getMessage(), $error->getCode());
        }
        // pelanggan::create($request->all());
        // return redirect('pelanggan')->with('success','Data pelanggan berhasil ditambahkan');
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepelangganRequest  $request
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepelangganRequest $request, pelanggan $pelanggan)
    {
        $pelanggan->update($request->all());
        return redirect('pelanggan')->with('success','Data pelanggan berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pelanggan $pelanggan)
    {
        try{
            DB::beginTransaction();
            $pelanggan->delete();
            DB::commit();
            return redirect('pelanggan')->with('success','Data pelanggan berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }
}
