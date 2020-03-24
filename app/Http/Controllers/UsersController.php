<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Datatables;
use Spatie\Permission\Models\Role;
use Hash;
use Validator, Redirect, Response, File;
use Image;
use App\Http\Requests\PrinterRequest;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
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
        //
    }

    /**
     * Display the specified resource.
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
        $user = User::find($id);
        // $roles = Role::pluck('name', 'name')->all();
        // $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit-user', compact('user'))->render();
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
        //
    }

    public function DataUsers()
    {
        $users = User::select(['id', 'name', 'email', 'created_at'])->with('roles');

        return datatables()->of($users)
            // ->addColumn('image', function ($image) {
            //     if (empty($image->image)) {
            //         return 'No Image';
            //     } else {
            //         $url = asset("assets/images/MTprint/$image->image");
            //         return '<img src=' . $url . ' border="0" height="30" width="45" class="img-rounded" align="center" />';
            //     }
            // })
            ->addColumn('action', function ($data) {
                $button = '<button type="button" name="show" data-id="' . $data->id . '" class="show btn btn-success btn-sm Showuser"> <i class="fa fa-eye"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="edit" data-id="' . $data->id . '" class="edit btn btn-primary btn-sm Edituser"><i class="fa fa-edit"></i></button>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" data-id="' . $data->id . '" class="delete btn btn-danger btn-sm Deleteuser"><i class="fa fa-trash-o"></i></button>';
                return $button;
            })
            // ->addColumn('role', function ($data) {
            //     $data = User::orderBy('id', 'DESC');
            //     foreach ($data as  $value) {
            //         if (!empty($value->getRoleNames())) {
            //             foreach ($value->getRoleNames() as $v) {
            //                 return '<center><span class="badge badge-info">' . $v . '<i class="fa fa-car"></i> </center>';
            //             }
            //         }
            //         // else {
            //         //     return '<center><span class="badge badge-info">Kosong<i class="fa fa-car"></i> </center>';
            //         // }
            //         return var_dump($value);
            //     }
            //     // return $data[2];
            // })
            ->addColumn('role', function ($user) {
                if (!empty(ucfirst($user->roles->first()['name']))) {
                    return '<center><span class="badge badge-info">' . ucfirst($user->roles->first()['name']) . '</center>';
                } else {
                    return '<center><span class="badge badge-warning"> not Role</center>';
                }
            })
            ->rawColumns(['action', 'role'])
            ->addIndexColumn()
            ->toJson();
    }
}
