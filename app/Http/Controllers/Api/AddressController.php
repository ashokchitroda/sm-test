<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Address;
use App\Http\Requests\AddressRequest;

class AddressController extends Controller
{
	/**
     * Add address
     *
     * @param Request $request request
     * @return \Illuminate\Http\JsonResponse
     *
     * @author Ashok Chitroda <ashok.chitroda@gmail.com>
     *
     * @SWG\Post(
     *     path="/add_address",
     *     summary="Address.",
     *     tags={"Address"},
     *     description="Add address to database.",
     *     produces={"application/json", "application/xml"},
     *     @SWG\Parameter(description="A valid name.", in="formData", name="name", required=true, type="string"),
     *     @SWG\Parameter(description="A valid email.", in="formData", name="email", required=true, type="string"),
     *     @SWG\Parameter(description="A valid mobile number.", in="formData", name="mobile", required=true, type="string"),
     *     @SWG\Response(
     *         response=201,
     *         description="successful operation",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items()
     *         )
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Unprocessable Entity",
     *         @SWG\Schema(ref="#/definitions/Error422")
     *     )
     * )
     */
    public function store(AddressRequest $request)
    {
    	try {
            $arr = $request->all();

            $address = Address::create($arr);

            return createdResponse($address);
        } catch (Exception $e) {
            return InternalServerErrorResponse($e);
        }
    }
}
