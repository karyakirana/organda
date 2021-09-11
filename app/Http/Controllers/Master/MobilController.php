<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Mobil;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MobilController extends Controller
{
    public function listMobil()
    {
        $data = Mobil::with('customer')
            ->whereNotIn('status', ['BLOKIR'])
            ->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('Action', function($row){
                $edit = '<a href="#" class="btn btn-sm btn-clean btn-icon" id="btnAddCustomer" data-value="'.$row->id_mobil.'" title="Edit"><i class="flaticon-download"></i></a>';
                return $edit;
            })
            ->addColumn('customer', function ($row){
                return $row->customer->nama_cust ?? '';
            })
            ->rawColumns(['Action'])
            ->make(true);
    }

    public function edit($id)
    {
        $data = Mobil::with('customer')->find($id);
        return response()->json($data);
    }
}
