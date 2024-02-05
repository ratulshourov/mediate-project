<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewUsers(){
        $users = User::all();
        return view('admin.user.view-users', compact('users'));
    }

    // public function saveuser(Request $request)
    // {
    //     $this->validate($request, array(
    //         'title' => 'required',
    //         'description' => 'required',
    //         'image' => 'required',
    //     ));
        
    //     $user = new user();
    //     $user->title = $request->input('title');
    //     $user->description = $request->input('description');
    //     if($request->hasfile('image'))
    //     {
    //         $file = $request->file('image');
    //         $extension = $file->getClientOriginalExtension();
    //         $fileName = time().'.'.$extension;
    //         $file->move('upload/user/', $fileName);
    //         $user->image = $fileName; 
    //     }
    //     $user->status = $request->input('status')==true ? '1':'0';
    //     $user->save();
    //     return redirect()->back()->with('status', 'Your user has been saved');
    // }

    // public function edituser($id){
    //     $user = user::Find($id);
    //     return view('admin.user.edit-user', compact('user'));
    // }

    // public function updateuser(Request $request, $id)
    // {
    //     $this->validate($request, array(
    //         'title' => 'required',
    //         'description' => 'required',
    //     ));
    //     $user = user::Find($id);
    //     $user->title = $request->input('title');
    //     $user->description = $request->input('description');
    //     if($request->hasfile('image'))
    //     {
    //         $destination = 'upload/user/'.$user->image;
    //         if(File::exists($destination)){
    //             File::delete($destination);
    //         }
    //         $file = $request->file('image');
    //         $extension = $file->getClientOriginalExtension();
    //         $fileName = time().'.'.$extension;
    //         $file->move('upload/user/', $fileName);
    //         $user->image = $fileName; 
    //     }
    //     $user->update();
    //     return redirect('/admin/view-users')->with('status', 'Your user item has been updated');
    // }

    // public function deleteuser($id){
    //     $user = user::Find($id);
    //     $user->delete();
    //     return redirect('/view-users')->with('status', 'Your user item has been deleted');
    // }

    public function activeUser($id)
    {
        $user = User::find($id);
        $user->status = '1';
        $user->update();
        return redirect()->back()->with('status', 'User Activated');
    }

    public function deactiveUser($id)
    {
        $user = User::find($id);
        $user->status = '0';
        $user->update();
        return redirect()->back()->with('warning', 'User De-activated');
    }
}
