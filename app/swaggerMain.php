<?php

/**
 * @SWG\Swagger(
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="SMIT test with laravel 5.5",
 *         @SWG\License(name="MIT")
 *     ),
 *     host="localhost/test/test/public/api",
 *     basePath="/",
 *     schemes={"http"},
 *     consumes={"application/x-www-form-urlencoded"},
 *     produces={"application/x-www-form-urlencoded"},
 *     @SWG\Definition(
 *         definition="Error404",
 *         @SWG\Property(
 *             property="error",
 *             type="object",
 *             @SWG\Property(property="code", type="integer",  default="404"),
 *             @SWG\Property(property="message", type="string", example="Resource Not Found")
 *         )
 *     ),
 *     @SWG\Definition(
 *         definition="Error403",
 *         @SWG\Property(
 *             property="error",
 *             type="object",
 *             @SWG\Property(property="code", type="integer",  default="403"),
 *             @SWG\Property(property="message", type="string", example="Access Denied")
 *         )
 *     ),
 *     @SWG\Definition(
 *         definition="Error401",
 *         @SWG\Property(
 *             property="error",
 *             type="object",
 *             @SWG\Property(property="code", type="integer",  default="403"),
 *             @SWG\Property(property="message", type="string", example="Unauthorized User")
 *         )
 *     ),
 *     @SWG\Definition(
 *         definition="Error422",
 *         type="object"
 *     ),
 *     @SWG\Definition(
 *         definition="Error500",
 *         @SWG\Property(
 *             property="error",
 *             type="object",
 *             @SWG\Property(property="code", type="integer",  default="500"),
 *             @SWG\Property(property="message", type="string", example="Internal Server Error")
 *         )
 *     ),
 * )
 */
?>