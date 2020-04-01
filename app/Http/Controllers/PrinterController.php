<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Printers;
use Illuminate\Support\Facades\DB;
use Datatables;
use Carbon\Carbon;
use Validator, Redirect, Response, File;
use Image;
use App\Http\Requests\PrinterRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class PrinterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:Read', ['only' => ['index', 'store']]);
        $this->middleware('permission:Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete', ['only' => ['destroy']]);
    }

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
    public function store(PrinterRequest $request)
    {
        // $this->validate($request, [
        //     'name_printer' => 'required',
        //     'brand_printer' => 'required',
        //     'price_printer' => 'required',
        //     'image_printer' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);


        $printer = new Printers();
        $printer->name = $request->name_printer;
        $printer->image = $request->image_printer;
        $printer->brand = $request->brand_printer;
        $printer->stock = $request->stock_printer;
        $printer->price = $request->price_printer;


        $image = $request->file('image_printer');
        $name = $image->getClientOriginalName();
        $size = $image->getClientSize();
        $destinationPath = public_path('/assets/images/MTprint/');
        $image->move($destinationPath, $name);
        $printer->image = $name;

        //dd($printer);
        $printer->save();



        return redirect()->route('input-printer')
            ->with('success', 'data telah tersimpan ');
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
    public function update_printer(Request $request, $id)
    {
        $printer = Printers::find($id);
        $printer->name = $request->name_printer;
        // $printer->image = $request->image_printer;
        $printer->brand = $request->brand_printer;
        $printer->stock = $request->stock_printer;
        $printer->price = $request->price_printer;
        // $printer->image = $name;

        if ($request->file('image_printer')) {
            $image = $request->file('image_printer');
            $name = $image->getClientOriginalName();
            $size = $image->getClientSize();
            $destinationPath = public_path('/assets/images/MTprint/');
            $image->move($destinationPath, $name);

            $printer->update([
                'name' => $request->name_printer,
                'brand' => $request->brand_printer,
                'stock' => $request->stock_printer,
                'price' => $request->price_printer,
                'image' => $name,
            ]);
        } else {
            $printer->update([
                'name' => $request->name_printer,
                'brand' => $request->brand_printer,
                'stock' => $request->stock_printer,
                'price' => $request->price_printer,

            ]);
        }

        // $printer->update();
        //REDIRECT KE HALAMAN LIST KATEGORI
        // DB::table('printers')->where('id', $id)->update([
        //     'name' => $request->name_printer,
        //     'brand' => $request->brand_printer,
        //     'stock' => $request->stock_printer,
        //     'price' => $request->price_printer,

        // ]);
        Alert::success('Success ', 'Data Printer Berhasil di ubah');
        return redirect(route('printer'));
        // return view('printer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = Printers::where('id', $id)->first();
        File::delete('assets/images/MTprint/' . $gambar->image);

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
                    return '<img src=' . $url . ' border="0" height="30" width="45" class="img-rounded" align="center" />';
                }
            })
            ->addColumn('action', function ($data) {
                if (Auth::user()->can('Read')) {
                    $button = '<button type="button" name="show" data-id="' . $data->id . '" class="show btn btn-success btn-sm ShowPrinter"> <i class="fa fa-eye"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                }
                if (Auth::user()->can('Update')) {
                    $button .= '<button type="button" name="edit" data-id="' . $data->id . '" class="edit btn btn-primary btn-sm EditPrinter"><i class="fa fa-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                }
                if (Auth::user()->can('Delete')) {
                    $button .= '<button type="button" name="delete" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm DeletePrinter"><i class="fa fa-trash-o"></i></button>';
                }
                return $button;
            })
            ->addColumn('status', function ($stock) {
                if ($stock->stock <= 0) {
                    return '<center><span class="badge badge-warning">Kosong  <i class="fa fa-battery-empty"></i> </center>';
                } else {
                    return '<center><span class="badge badge-info">Ready  <i class="fa fa-car"></i> </center>';
                }
            })
            ->rawColumns(['image', 'action', 'status'])
            ->addIndexColumn()
            ->toJson();
    }

    public function input_printer()
    {
        return view('printer.input-printer');
    }
}
