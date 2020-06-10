<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Closure; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        if($request->isJson()){
            $users = User::all();
            return response()->json($users,200);
        }
        return response()->json(['error' => 'Unauthorized'],401,[]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        if($request->isJson()){
            // TODO:cREATE
            $data = $request->json()->all();
            $user = User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'api_token' => str_random(60)
            ]);
            return response()->json($user,201)  ;
        }
        return response()->json($user,401,[]);
    }

    public function getToken(Request $request){
        if($request->isJson()){
            try {
                $data = $request->json()->all();

                $user = User::where('username', $data['username'])->first();
                if($user && Hash::check($data['password'], $user->password)){
                    return response()->json($user, 200);
                }else{
                    return response()->json(['error'=>'No content'], 406);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['error'=>'No content'], 406);
            }
        }
        return response()->json(['error' => 'Un authorized'],401,[]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //  $user = User::find($id);
        // return User::find($id);
        if($id>0){
            // dd($user);
            $user = User::find($id);
            // dd($user);
            if(!empty($user))
            return response()->json($user,200);
            else
            return response()->json(['error' => 'Record not found!'],401,[]);
        }
        return response()->json(['error' => 'Record not found!'],401,[]);
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
        if($id>0){
            // dd($user);
            $user = User::find($id);
            if(!empty($user)){
            $user->update($request->all());
            return response()->json($user,200);
            }
            else
            return response()->json(['error' => 'Record not found!'],401,[]);
        }
        return response()->json(['error' => 'Record not found!'],401,[]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id>0 && is_numeric($id)){
            // dd($user);
            $user = User::destroy($id);
            // dd($user);
            if(!empty($user))
            return response()->json($user,200,['Deleted']);
            else
            return response()->json(['error' => 'Record not exist to delete!'],401,[]);
        }
        return response()->json(['error' => 'Record not found!'],401,[]);
    }
}
