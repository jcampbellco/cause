<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * I fully admit this class would be better as a form validator class, but because I'm using middleware to transform
 * the request to extract all the relevant data I need to validate it before that middleware runs.
 */
class ContactValidator
{
    public function handle(Request $request, Closure $next)
    {
        $data = $request->offsetGet('data');

        $errors = [];

        foreach ($data as $index => $datum) {
            $validator = Validator::make($datum, [
                'first_name' => 'required|string',
                'last_name'  => 'required|string',
                'email'      => 'required|email',
                'age'        => 'required|integer',
                'secret'     => 'required|string',
            ]);

            if ($validator->getMessageBag()->isNotEmpty()) {
                $errors[$index] = $validator->getMessageBag()->getMessages();
            }
        }

        if (\count($errors) > 0) {
            return new JsonResponse($errors, 422);
        }

        return $next($request);
    }
}
