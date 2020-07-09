<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Products;
use Illuminate\Support\Facades\DB;
use Datatables;
use Carbon\Carbon;
use Validator, Redirect, Response, File;
use Image;
use App\Http\Requests\ProductRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:Read', ['only' => ['index', 'store']]);
        $this->middleware('permission:Create', ['only' => ['create', 'store']]);
        $this->middleware('permission:Update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('product.index');
    }

    public function create()
    {
        //
    }


    public function store(ProductRequest $request)
    {

        $product = new Products();
        $product->name = $request->name;
        $product->type = $request->type_product;
        $product->image = $request->image_product;
        $product->brand = $request->brand_product;
        $product->spesifikasi = $request->spesifikasi_product;
        $product->stock = $request->stock_product;
        $product->price = $request->price_product;
        $product->priceperWeek = $request->priceperWeek_product;
        $product->priceperMonth = $request->priceperMonth_product;

        $image = $request->file('image_product');
        $name = $image->getClientOriginalName();
        $size = $image->getClientSize();

        if ($request->type_product == 'printer') {
            $destinationPath = public_path('/assets/images/MTprint/product/printer/');
        }elseif ($request->type_product == 'laptop') {
            $destinationPath = public_path('/assets/images/MTprint/product/laptop/');
        }elseif ($request->type_product == 'proyektor') {
            $destinationPath = public_path('/assets/images/MTprint/product/proyektor/');
        }elseif ($request->type_product == 'toner') {
            $destinationPath = public_path('/assets/images/MTprint/product/toner/');
        }
        $image->move($destinationPath, $name);
        $product->image = $name;

        $product->save();
        return redirect()->route('input-product')
            ->with('success', 'data telah tersimpan ');
    }


    public function show($id)
    {

        $product = Products::find($id);
        // return view('product.show-product', compact('product'));
        // if($request->ajax()){
        //     return view('awesome')->renderSections()['content'];
        // }
        $html = view('product.show-product')->with(compact('product'));
        return $html->render();
        // return $html->render();
    }


    public function edit($id)
    {
        $product = Products::find($id);

        $html = view('product.edit-product')->with(compact('product'));
        return $html->render();
    }

    public function update_product(Request $request, $id)
    {
        $product = Products::find($id);
        if ($request->file('image_product')) {
            $image = $request->file('image_product');
            $name = $image->getClientOriginalName();
            $size = $image->getClientSize();

            if ($request->type_product == 'printer') {
                $destinationPath = public_path('/assets/images/MTprint/product/printer/');
            }elseif ($request->type_product == 'laptop') {
                $destinationPath = public_path('/assets/images/MTprint/product/laptop/');
            }elseif ($request->type_product == 'proyektor') {
                $destinationPath = public_path('/assets/images/MTprint/product/proyektor/');
            }elseif ($request->type_product == 'toner') {
                $destinationPath = public_path('/assets/images/MTprint/product/toner/');
            }

            if (!empty($product->image)) {
                if ($product->type == 'printer') {
                    File::delete(public_path('/assets/images/MTprint/product/printer/' . $product->image));
                }elseif ($product->type == 'laptop') {
                    File::delete(public_path('/assets/images/MTprint/product/laptop/' . $product->image));
                }elseif ($product->type == 'proyektor') {
                    File::delete(public_path('/assets/images/MTprint/product/proyektor/' . $product->image));
                }elseif ($product->type == 'toner') {
                    File::delete(public_path('/assets/images/MTprint/product/toner/' . $product->image));
                }    
            }

            $image->move($destinationPath, $name);

            $product->update([
                'name' => $request->name,
                'brand' => $request->brand_product,
                'stock' => $request->stock_product,
                'type' => $request->type_product,
                'price' => $request->price_product,
                'priceperWeek' => $request->priceperWeek_product,
                'priceperMonth' => $request->priceperMonth_product,
                'spesifikasi' => $request->spesifikasi_product,
                'image' => $name,
            ]);
        } else {
            $product->update([
                'name' => $request->name,
                'brand' => $request->brand_product,
                'stock' => $request->stock_product,
                'type' => $request->type_product,
                'price' => $request->price_product,
                'priceperWeek' => $request->priceperWeek_product,
                'priceperMonth' => $request->priceperMonth_product,
                'spesifikasi' => $request->spesifikasi_product,
            ]);
        }

        Alert::success('Success ', 'Data product Berhasil di ubah');
        return redirect(route('product'));
        // return view('product.index');
    }


    public function destroy($id)
    {
        $gambar = Products::where('id', $id)->first();
        if (!empty($gambar->type)) {
            if ($gambar->type == 'printer') {
                File::delete(public_path('/assets/images/MTprint/product/printer/' . $gambar->image));
            }elseif ($gambar->type == 'laptop') {
                File::delete(public_path('/assets/images/MTprint/product/laptop/' . $gambar->image));
            }elseif ($gambar->type == 'proyektor') {
                File::delete(public_path('/assets/images/MTprint/product/proyektor/' . $gambar->image));
            }elseif ($gambar->type == 'toner') {
                File::delete(public_path('/assets/images/MTprint/product/toner/' . $gambar->image));
            }    
        }
        Products::find($id)->delete();

        return response()->json(['success' => 'Products deleted successfully.']);
    }

    public function DataTableProducts()
    {
        $products = DB::table('products')->select('*');

        return datatables()->of($products)
            ->addColumn('image', function ($image) {
                if (empty($image->image)) {
                    return 'No Image';
                } else {
                    if ($image->type == 'printer') {
                        $url = asset("assets/images/MTprint/product/printer/$image->image");
                    }elseif ($image->type == 'laptop') {
                        $url = asset("assets/images/MTprint/product/laptop/$image->image");
                    }elseif ($image->type == 'proyektor') {
                        $url = asset("assets/images/MTprint/product/proyektor/$image->image");
                    }elseif ($image->type == 'toner') {
                        $url = asset("assets/images/MTprint/product/toner/$image->image");
                    }
                    
                    return '<img src=' . $url . ' border="0" height="30" width="45" class="img-rounded" align="center" />';
                }
            })
            ->addColumn('action', function ($data) {
                if (Auth::user()->can('Read')) {
                    $button = '<button type="button" name="show" data-id="' . $data->id . '" class="show btn btn-success btn-sm ShowProduct"> <i class="fa fa-eye"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                }
                if (Auth::user()->can('Update')) {
                    $button .= '<button type="button" name="edit" data-id="' . $data->id . '" class="edit btn btn-primary btn-sm EditProduct"><i class="fa fa-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                }
                if (Auth::user()->can('Delete')) {
                    $button .= '<button type="button" name="delete" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm DeleteProduct"><i class="fa fa-trash-o"></i></button>';
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

    public function input_product()
    {
        return view('product.input-product');
    }
}
