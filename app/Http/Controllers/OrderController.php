<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\DB;
use Datatables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
   public function index(){
       return view('order.index');
   }

   public function DataTableOrder(Request $request){
    
     if (!empty($request->from_date)) {
         $data = DB::table('orders')
        ->whereBetween('tgl_pesan', array($request->from_date, $request->to_date))
        ->get();
        return datatables()->of($data)
        ->addColumn('action', function ($data) {
            $button = '<button type="button" name="show" data-id="' . $data->id . '" class="show btn btn-success btn-sm Showuser"> <i class="fa fa-shopping-cart"></i>Orders</button>';
            $button .= '&nbsp;&nbsp;';
            // $button .= '<button type="button" name="edit" data-id="' . $data->id . '" class="edit btn btn-primary btn-sm Edituser"><i class="fa fa-users"></i></button>';
            // $button .= '&nbsp;&nbsp;';
            $button .= '<button type="button" name="delete" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm Deleteuser"><i class="fa fa-trash-o"></i></button>';
            return $button;
        })
        ->addColumn('verified', function ($data) {
            if ($data->verified == 1) {
                return '<center><span class="badge badge-info">terkonfirmasi</center>';
            } else {
                return '<center><span class="badge badge-warning">blm terkonfirmasi</center>';
            }
        })
        ->addColumn('status', function ($data) {
            if ($data->status == 1) {
                return '<center><span class="badge badge-success"> di terima </center>';
            }elseif ($data->status == 2){
                return '<center><span class="badge badge-primary"> di kembalikan </center>';
            }
        })
        
        ->rawColumns(['action','verified','status'])
        ->addIndexColumn()
        ->toJson();
        }else {
            $data = DB::table('orders')->select('*');
            return datatables()->of($data)
            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="show" data-id="' . $data->id . '" class="show btn btn-success btn-sm Showuser"> <i class="fa fa-shopping-cart"></i>Orders</button>';
                $button .= '&nbsp;&nbsp;';
                // $button .= '<button type="button" name="edit" data-id="' . $data->id . '" class="edit btn btn-primary btn-sm Edituser"><i class="fa fa-users"></i></button>';
                // $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm Deleteuser"><i class="fa fa-trash-o"></i></button>';
                return $button;
            })
            ->addColumn('verified', function ($data) {
                if ($data->verified == 1) {
                    return '<center><span class="badge badge-info">terkonfirmasi</center>';
                } else {
                    return '<center><span class="badge badge-warning">blm terkonfirmasi</center>';
                }
            })
            ->addColumn('status', function ($data) {
                if ($data->status == 1) {
                    return '<center><span class="badge badge-success"> di terima </center>';
                }elseif ($data->status == 2){
                    return '<center><span class="badge badge-primary"> di kembalikan </center>';
                }
            })
            
            ->rawColumns(['action','verified','status'])
            ->addIndexColumn()
            ->toJson();
       }
   }
}
