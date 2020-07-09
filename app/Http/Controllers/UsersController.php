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
   

    public function index()
    {
        return view('users.index');
    }

 
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

  
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

 
    public function user_role($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit-user', compact('user', 'roles', 'userRole'))->render();
    }


    public function user_role_update(Request $request, $id)
    {

       $user = User::find($id);
       DB::table('model_has_roles')->where('model_id', $id)->delete();
       $user->assignRole($request->input('roles'));

       if (!empty($request->roles) ) {
        Alert::success('Success ', 'User Role Berhasil di Update');
       }
        return redirect()->route('user');
    }


    public function destroy($id)
    {
        $user = User::find($id)->delete(); 
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
                $button .= '<button type="button" name="edit" data-id="' . $data->id . '" class="edit btn btn-primary btn-sm Edituser"><i class="fa fa-users"></i></button>';
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
