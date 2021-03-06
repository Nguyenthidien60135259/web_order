<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:32',
            'passwordAgain' => 'required|same:password',
            'dateOfBirth' => 'required|date',
            'phone' => 'required|between:10,12',
            'sex' => 'required|boolean',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        // $user = User::create(array_merge(
        //             $validator->validated(),
        //             ['password' => bcrypt($request->password)]
        //         ));
        $password = base64_encode($request->password);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'roles_id' => $request->roles_id = 3
        ]);
        $user->save();
        $user_id = $user->id;
        $customer = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'dateOfBirth' => $request->dateOfBirth,
            'phone' => $request->phone,
            'sex' => $request->sex,
            'address' => $request->address,
            'user_id' => $user_id
        ]);
        $customer->save();


        return response()->json([
            'message' => 'User successfully registered',
            'data'=>[
                'user'=>$user,
                'customer'=>$customer
            ]
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6|max:32'
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=>$validator->errors()->toJson()], 400);
        }
        $email = $request->email;
        $user = User::where('email','Like',"%$email%")->first();
        $pas = base64_encode($request->password);
        if($user->password == $pas)
        {
            return response()->json([
                "message"=>"????ng nh???p th??nh c??ng",
                "user"=>$user
            ]);
        }
        else{
            return response()->json([
               "message"=>"????ng nh???p kh??ng th??nh c??ng sai email ho???c m???t kh???u"
            ]);
        }
    }


    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function changePassWord(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:6|max:32',
            'new_password' => 'required|min:6|max:32',
            're_new_password' => 'required|same:new_password'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $userId = $request->user_id;

        $user = User::where('id', $userId)->update(
            ['password' => base64_encode($request->new_password)]
        );
        $customer = Customer::where('user_id', $userId)->update(
            ['password' => base64_encode($request->new_password)]
        );

        return response()->json([
            'message' => 'User successfully changed password',
            'user' => $user,
            'customer'=>$customer
        ], 201);
    }


}
