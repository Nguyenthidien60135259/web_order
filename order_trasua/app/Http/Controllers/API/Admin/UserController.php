<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        $user = User::all();
        $customer=Customer::all();
        return response()->json([
            "user"=>$user,
            "customer"=>$customer
        ]);
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
        $customer = Customer::find($id);
        $user = User::where("id",$customer->user_id)->get();
        return response()->json([
            "user"=>$user,
            "customer"=>$customer
        ]);
    }

    public function show_id($id)
    {
        $user = User::find($id);
        $customer = Customer::find($id);
        if($user)
        {
            return response()->json([$user]);
        }
        if($customer)
        {
            return response()->json([$customer]);
        }

        return response()->json(["messge"=>"not found"]);
    }
}
