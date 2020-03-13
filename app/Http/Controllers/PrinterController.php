<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Printers;
use Illuminate\Support\Facades\DB;
use Datatables;
use Carbon\Carbon;
use Validator, Redirect, Response, File;

class PrinterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('printer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_printer' => 'required',
            'brand_printer' => 'required',
            'price_printer' => 'required',
        ]);

        $printer = new Printers();
        $printer->name = $request->name_printer;
        $printer->image = $request->image_printer;
        $printer->brand = $request->brand_printer;
        $printer->stock = $request->stock_printer;
        $printer->price = $request->price_printer;
        $gambar = $request->file('image_printer');
        $namaFile = $gambar->getClientOriginalName();
        $printer->file('image_printer')->move('assets/images/MTprint/', $namaFile);
        $printer->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $printer = Printers::find($id);
        // return view('printer.show-printer', compact('printer'));
        // if($request->ajax()){
        //     return view('awesome')->renderSections()['content'];
        // }
        $html = view('printer.show-printer')->with(compact('printer'));
        return $html->render();
        // return $html->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $printer = Printers::find($id);

        $html = view('printer.edit-printer')->with(compact('printer'));
        return $html->render();
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
        Printers::find($id)->delete();

        return response()->json(['success' => 'Printers deleted successfully.']);
    }

    public function DataTablePrinters()
    {
        $printers = DB::table('printers')->select('*');

        return datatables()->of($printers)
            ->addColumn('image', function ($image) {
                if (empty($image->image)) {
                    return 'No Image';
                } else {
                    $url = asset("assets/images/MTprint/$image->image");
                    return '<img src=' . $url . ' border="0" height="40" width="50" class="img-rounded" align="center" />';
                }
            })
            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="show" data-id="' . $data->id . '" class="show btn btn-success btn-sm ShowPrinter"> <i class="fa fa-eye"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="edit" data-id="' . $data->id . '" class="edit btn btn-primary btn-sm EditPrinter"><i class="fa fa-edit"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm DeletePrinter"><i class="fa fa-trash-o"></i></button>';
                return $button;
            })
            ->rawColumns(['image', 'action', 'noid'])
            ->addIndexColumn()
            ->toJson();
    }

    public function input_printer()
    {
        return view('printer.input-printer');
    }
}
