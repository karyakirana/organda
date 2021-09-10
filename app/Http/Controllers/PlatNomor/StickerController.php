<?php

namespace App\Http\Controllers\PlatNomor;

use App\Http\Controllers\Controller;
use App\Models\Nopol\Sticker;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StickerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.nopol.sticker');
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function listData()
    {
        $data = Sticker::with(['sopir', 'customer'])->latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('mobil', function($row){
                return $row->mobil->nopol_mobil;
            })
            ->addColumn('customer', function ($row){
                return $row->customer->nama_cust;
            })
            ->addColumn('Action', function ($row){
                $edit = '<a href="#" class="btn btn-sm btn-clean btn-icon" id="btnEdit" data-value="'.$row->id.'" title="edit"><i class="la la-edit"></i></a>';
                $show = '<a href="#" class="btn btn-sm btn-clean btn-icon" id="btnShow" data-value="'.$row->id.'" title="show"><i class="flaticon2-indent-dots"></i></a>';
                $delete = '<a href="#" class="btn btn-sm btn-clean btn-icon" id="btndelete" data-value="'.$row->id_jual.'" title="delete"><i class="flaticon2-trash"></i></a>';
                $print = '<a href="#" class="btn btn-sm btn-clean btn-icon" id="btnPrint" data-value="'.$row->id.'" title="print"><i class="flaticon-technology"></i></a>';
                return $edit.$show.$delete.$print;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.nopol.stickerTrans');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'tglSticker'=>'required|date',
                'platNomor'=>'required',
                'perusahaan'=>'required|string',
                'status'=>'required',
            ]
        );
        $data = Sticker::updateOrCreate(
            ['id'=>$request->id],
            [
                'tgl_sticker'=>date('Y-m-d', strtotime($request->tglSticker)),
                'masa_berlaku'=> ($request->masaBerlaku) ? date('Y-m-d', strtotime($request->tglBerlaku)) : null,
                'kode_sticker'=>'-',
                'id_sopir'=>$request->idSopir,
                'id_cust'=>$request->idCustomer,
                'perusahaan'=>$request->perusahaan,
                'status'=>$request->status,
                'keterangan'=>$request->keterangan
            ]
        );
        return response()->json(['status'=>true, 'keterangan'=>$data]);
    }

    /**
     * Display the specified resource.
     * Print sticker
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
        $data = Sticker::find($id);
        return response()->json($data);
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
        $data = Sticker::destroy($id);
        return response()->json(['status'=>true, 'keterangan'=>$data]);
    }
}
