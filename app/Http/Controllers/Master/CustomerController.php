<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Customer;
use App\Models\Master\Sopir;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function listCustomer()
    {
        $data = Customer::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('Action', function($row){
                $edit = '<a href="#" class="btn btn-sm btn-clean btn-icon" id="btnAddCustomer" data-value="'.$row->id_cust.'" title="Edit"><i class="flaticon-download"></i></a>';
                return $edit;
            })
            ->rawColumns(['Action'])
            ->make(true);
    }

    public function test()
    {
        $data = Customer::all();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('Action', function($row){
                $edit = '<a href="#" class="btn btn-sm btn-clean btn-icon" id="btnAddCustomer" data-value="'.$row->id_cust.'" title="Edit"><i class="flaticon-download"></i></a>';
                return $edit;
            })
            ->rawColumns(['Action'])
            ->make(true);
    }

    public function edit($id)
    {
        $data = Customer::find($id);
        return $data;
    }
}
