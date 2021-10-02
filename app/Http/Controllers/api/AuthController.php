<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Terpx_user;
use Auth;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;
use TymonJWTAuthExceptionsJWTException;
use JWTAuth;
use Response;

// use Request;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name' => 'required|string',
            'phone' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'email' => 'required|unique:terpx_users,email',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            $errors = $validation->errors();

            return response()->json(['response' => $errors], 400);

        } else {
            $terpx_users = new Terpx_user();
            $terpx_users->name =$request->name;
            $terpx_users->email = $request->email;
            $terpx_users->phone = $request->phone;
            $terpx_users->address = $request->address;
            $terpx_users->postal_code = $request->postal_code;
            $terpx_users->password = Hash::make($request->password);
            $terpx_users->save();
            //  return response()->json(['response' => True], 201);
            // $token = auth()->login($terpx_users);

            $token = JWTAuth::fromUser($terpx_users);
            return response()->json(compact('terpx_users', 'token'), 201);
        }

    }

    // public function login(Request $request)
    // {
    //     $validation = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     if ($validation->fails()) {
    //         $errors = $validation->errors();

    //         return response()->json(['response' => $errors], 401);

    //     } else {
    //         $credentials = Request()->only(['email', 'password']);

           

    //             if (!$token = JWTAuth::attempt($credentials)) {

                   
    //               return response()->json('0', 200);
    //             }

                

    //         return response()->json($token, 200);
    //     }

    // }




    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
 
        $user = Terpx_user::where([
           'email' => $request->email,
          //  'password' => Hash::make($request->password)
      ])->first();

          if($user){
            if(Hash::check($request->password, $user->password)) {
              $token = JWTAuth::fromUser($user);
              $data=[
               
                'user'=>$user,
                'token'=>$token
              ];
              return response()->json($data,200);
              } else {
                return response()->json('Unauthorized',401);
            }
          }
          else {
            return response()->json('Unauthorized',401);
        }
      

    

     
 
        
    }
    protected function respondWithToken($token)
    {
        //   return response()->json([
        //     'access_token' => $token,
        //     'token_type' => 'bearer',
        //     'expires_in' => auth()->factory()->getTTL() * 60
        //   ]);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            //'expires_in' => auth()->factory()->getTTL() * 60
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ]);
    }
}
