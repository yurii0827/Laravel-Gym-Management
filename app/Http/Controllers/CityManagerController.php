<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CityManagerController extends Controller
{

    #=======================================================================================#
    #			                           Create Function                              	#
    #=======================================================================================#
    public function create()
    {
        return view('cityManager.create', [
            'users' => User::all(),
        ]);
    }
    #=======================================================================================#
    #			                           Store Function                                	#
    #=======================================================================================#
    public function store(Request $request)
    {

                $validated = $request->validate([
                'name' => 'required|unique:users|max:20',
                'password' => 'required |min:6',
                'email' => 'required|string|unique:users',
                'national_id' =>'digits_between:10,17|required|numeric|unique:users',
                'profile_image' => 'required|image',
            ]);
            
            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $name = time() . \Str::random(30) . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/imgs');
                $image->move($destinationPath, $name);
                $imageName = 'imgs/' . $name;
            }
        
            $user=new User();
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=$request->password;
            $user->profile_image=$imageName;
            $user->national_id=$request->national_id;
            $user->assignRole('cityManager');
            $user->save();
            
        return redirect()->route('cityManager.list');
    }


    #=======================================================================================#
    #			                           List Function                                	#
    #=======================================================================================#
    public function list()
    {
        $usersFromDB =  User::role('cityManager')->withoutBanned()->get();
        // $usersFromDB = User::all();
        // $usersFromDB =  User::role('cityManager')->get();
        if (count($usersFromDB) <= 0) { //for empty statement
            return view('empty');
        }
        return view("cityManager.list", ['users' => $usersFromDB]);

    }
    #=======================================================================================#
    #			                           Show Function                                	#
    #=======================================================================================#
    public function show($id)
    {
        $singleUser = User::findorfail($id);
        return view("cityManager.show", ['singleUser' => $singleUser]);
    }
    #=======================================================================================#
    #			                           Edit Function                                	#
    #=======================================================================================#
    public function edit($id)
    {
        $users = User::all();

        $singleUser = User::find($id);

        return view("cityManager.edit", ['singleUser' => $singleUser, 'users' => $users]);
    }

   

    #=======================================================================================#
    #			                           Update Function                                	#
    #=======================================================================================#
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'min:2'],
        //     'email' => ['required', 'string', 'unique:App\Models\User,email'],

        // ]);


        // User::where('id', $id)->update([

        //     'name' => $request->all()['name'],
        //     'email' => $request->email,



        // ]);
        // return redirect()->route('cityManager.list');


        // $validated = $request->validate([
        //     'name' => 'required|unique:users|max:20',
        //     'password' => 'required |min:6',
        //     'email' => 'required|string|unique:users',
        //     'profile_image' => 'required|image',
        // ]);

        $user=User::find($id);
        $user->name=$request->name;
        $user->password=$request->password;
        $user->email=$request->email;
    

        if($request->hasFile('profile_image')){
            $image=$request->file('profile_image');
            $name=time().\Str::random(30).'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/imgs');
            $image->move($destinationPath,$name);
            $imageName='imgs/'.$name;
            if(isset( $user->profile_image))
                  File::delete(public_path('imgs/' . $user->profile_image));
                $user->profile_image=$imageName;
            
        }
        $user->save();
        return redirect()->route('cityManager.list');
    }

    #=======================================================================================#
    #			                           Delete Function                                	#
    #=======================================================================================#
    public function deletecityManager($id)
    {

        $singleUser = User::findorfail($id);
        $singleUser->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }
}
