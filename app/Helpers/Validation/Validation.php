<?php

namespace App\Helpers\Validation;

class Validation
{
    public static function errorMessage($validator)
    {
        if ($validator->fails()) {
            $flatErrors = collect($validator->errors()->messages())
                ->mapWithKeys(function ($messages, $field) {
                    return [$field => $messages[0]];
                })->toArray();

            return response()->json([
                'status' => 'error',
                'errors' => $flatErrors,
                'status_code' => 422
            ], 422);
        }

        return 0;
    }
}
