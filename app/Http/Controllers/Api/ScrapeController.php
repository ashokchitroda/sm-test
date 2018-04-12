<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScrapeController extends Controller
{
	/**
     * Scrape request.
     *
     * @param Request $request request
     * @return \Illuminate\Http\JsonResponse
     *
     * @author Ashok Chitroda <ashok.chitroda@gmail.net>
     *
     * @SWG\Post(
     *     path="/scrape",
     *     summary="Scrape request.",
     *     tags={"Scrape Request"},
     *     description="Scrape request to get links.",
     *     produces={"application/json", "application/xml"},
     *     @SWG\Parameter(description="A valid web page link.", in="formData", name="page_link", required=true, type="string"),
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
                'page_link' => 'required|url',
            ]
        );

    	try {
	    	$html = file_get_contents($request->input('page_link'));
			$dom = new \DOMDocument;
			$internalErrors = libxml_use_internal_errors(true);
			@$dom->loadHTML($html);
			$links = $dom->getElementsByTagName('a');

			foreach ($links as $link){
			    $arr[] = $link->getAttribute('href');
			}

			libxml_use_internal_errors($internalErrors);

			return listResponse($arr);
        } catch (Exception $e) {
            return InternalServerErrorResponse($e);
        }
    }
}
