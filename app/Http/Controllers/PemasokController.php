<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use App\Http\Requests\StorePemasokRequest;
use App\Http\Requests\UpdatePemasokRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use PDOException;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $data['Pemasok'] = Pemasok::orderBy('created_at', 'DESC')->get();

        return view('Pemasok.index')->with($data);
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
    public function store(StorePemasokRequest $request)
    {
        //error handling
        try{
            DB::beginTransaction();  //mulai transaksi
            Pemasok::create($request->all());  //query input ke tabel

            DB::commit();  //menyimpan data ke database

            //untuk merefresh ke halaman itu kembali untuk melihat hasil input
            return redirect('pemasok')->with('success', "Input data berhasil");
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();

            //$this->failResponse($error->getMessage(), $error->getCode());
        }
        // Pemasok::create($request->all());
        // return redirect('Pemasok')->with('success','Data Pemasok berhasil ditambahkan');
    }
    


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemasokRequest  $request
     * @param  \App\Models\Pemasok  $Pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemasokRequest $request, Pemasok $Pemasok)
    {
        $Pemasok->update($request->all());
        return redirect('pemasok')->with('success','Data Pemasok berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasok  $Pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasok $Pemasok)
    {
        try{
            DB::beginTransaction();
            $Pemasok->delete();
            DB::commit();
            return redirect('pemasok')->with('success','Data Pemasok berhasil dihapus');
        }
        catch(QueryException | Exception | PDOException $error){
            DB::rollBack(); //undo perubahan query/table
            return "terjadi kesalahan" .$error->getMessage();
        }
    }
}
