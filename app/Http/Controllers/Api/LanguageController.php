<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
	/**
     * Check text is english laguage or not.
     *
     * @param Request $request request
     * @return \Illuminate\Http\JsonResponse
     *
     * @author Ashok Chitroda <ashok.chitroda@gmail.net>
     *
     * @SWG\Post(
     *     path="/is_english",
     *     summary="Langauge.",
     *     tags={"Langauge"},
     *     description="Check text is english laguage or not.",
     *     produces={"application/json", "application/xml"},
     *     @SWG\Parameter(description="A valid text.", in="formData", name="text", required=true, type="string"),
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items()
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
    	$this->validate(
            $request, [
                'text' => 'required',
            ]
        );

    	try {
            $text = $request->input('text');

	    	if (strlen($text) != strlen(utf8_decode($text))) {
                return listResponse('Opps! Given text is not english language.');
            } else {
                return listResponse('Congrats, Given text is english language.');
            }
        } catch (Exception $e) {
            return InternalServerErrorResponse($e);
        }
    }
}
