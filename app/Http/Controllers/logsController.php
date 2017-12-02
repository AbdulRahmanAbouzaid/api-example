<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;

class logsController extends ApiController
{

    /**
     * Login.
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @SWG\Post(
     *     path="/api/v1/login",
     *     description="Login and Get Token.",
     *     operationId="login",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *          name="User's Credenitals",
     *          in="body",
     *          required=true,
     *          type="string",
     *          description="Enter Email and Password",
     *          schema={"$ref"="#/definitions/User"},
     *      ),
     *      
     *     tags={"Authorization"},
     *     @SWG\Response(
     *         response=200,
     *         description="SUCCESS"
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Unauthorized action.",
     *     )
     * )
     */
    
    public function login(Request $request)
    {
     	
		$credentials = $request->only('email', 'password');

		if(! $token = JWTAuth::attempt($credentials)) {

            return response()->json(['error' => 'Invalid Email OR Password'], 401);
		
		}

        // return the token
        return response()->json(compact('token'));

    }

}
