<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Validation\Validation;


class BranchController extends Controller
{
    function lists(Request $request)
    {
        $data = Branch::all();
        return response()->json([
            'status' => 'Success',
            'data' => $data,
            'status_code' => 200
        ]);
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'           => 'required|string|max:255',
            'location'       => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
        ]);

        // 🔁 Use your custom validation helper
        $validationResult = validation::errorMessage($validator);
        if ($validationResult !== 0) {
            return $validationResult;
        }

        // ✅ Create new branch
        $branch = new Branch();
        $branch->name = $request->name;
        $branch->location = $request->location;
        $branch->contact_number = $request->contact_number;
        $branch->save();

        // ✅ Success response
        return response()->json([
            'status'      => 'success',
            'new_data'    => $branch,
            'status_code' => 200
        ], 200);
    }
    function update(Request $request){
        $branch = Branch::find($request->id);
        if ($branch != null) {
            $branch -> name = $request -> name;
            $branch -> location = $request -> location;
            $branch -> contact_number = $request -> contact_number;
            $branch -> save();
        }
        return response()->json([
            'status' => 'Success',
            'new_data' => $branch,
            'status_code' => 200
        ]);
    }
    function delete(Request $request){
        $branch = Branch::find($request->id);
        if ($branch != null) {
            $branch->delete();
            return response()->json([
                'status' => 'Success',
                'old_data' => $branch,
                'status_code' => 200
            ]);
        }else{
            return response()->json([
                'status' => 'resource not found !',
                'status_code' => 200
            ]);
        }

    }
    //

}
