<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all(); 
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([ 
            'prefixname' => ['string'],
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'suffixname' => ['max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]); 

        $user = User::create([
            'prefixname' => $request->prefixname ? $request->prefixname : null,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename ? $request->middlename : null,
            'lastname' => $request->lastname,
            'suffixname' => $request->suffixname ? $request->suffixname : null,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]); 
        return redirect()->route('users.index');
    }

    public function isRequestNull($value){
        return $value ? $value : null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $user = User::findOrFail($user);  
      
 
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([ 
            'prefixname' => ['string'],
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'suffixname' => ['max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'] 
        ]); 

        // $user = User::where('id', $user)->first();
         
                $user->prefixname = $request->prefixname ? $request->prefixname : null;
                $user->firstname = $request->firstname;
                $user->middlename = $request->middlename ? $request->middlename : null;
                $user->lastname = $request->lastname;
                $user->suffixname = $request->suffixname ? $request->suffixname : null;
                $user->username = $request->username;
                $user->email = $request->email; 
                $user->save();
           
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        // $user = User::find($id)->delete();
        return back();
    }

    

    
    public function trashed(){
        $users = User::onlyTrashed()->orderByDesc('deleted_at')->get();
        return view('users.trashed', ['users' => $users]);
    }

    public function delete($id)
    {
        
        $user = User::where('id', $id)->onlyTrashed()->first();
        $user->forceDelete();
        return redirect()->route('users.trashed');
    }

    public function restore($id)
    { 
        $user = User::where('id', $id)->onlyTrashed()->first();
        $user->restore();
        return redirect()->route('users.trashed');
    }

    public function profile()
    { 
        $user = auth()->user(); 
        return view('user.profile', ['user' => $user]);
    }

    public function imageUpload(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = $request->image->getClientOriginalName();
     
        $request->image->move(public_path('profilepictures/'.auth()->id().'/'), $imageName);
  
        /* Store $imageName name in DATABASE from HERE */
        $update = User::where('id', auth()->id())->update(['photo' => $imageName]);
    
        return back()
            ->with('success','You have successfully upload image.'); 
    }

}
