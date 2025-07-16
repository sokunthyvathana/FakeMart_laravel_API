<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Validation\Validation;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="FakeMart Laravel API",
 *     description="API documentation for managing products, branches, and more.",
 *     @OA\Contact(
 *         email="sokunthyvathana@gmail.com"
 *     )
 * )
 */

class BranchController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/branch/lists",
     *     summary="Get list of branch",
     *     tags={"Branch"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation"
     *     )
     * )
     */
    public function index()
    {
        return Branch::all();
    }


    function lists(Request $request)
    {
        $data = Branch::all();
        return response()->json([
            'status' => 'Success',
            'data' => $data,
            'status_code' => 200
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/branch/create",
     *     summary="Create a new branch",
     *     tags={"Branch"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name","location","contact_number"},
     *             @OA\Property(property="name", type="string", example="Branch A"),
     *             @OA\Property(property="location", type="string", example="Phnom Penh"),
     *             @OA\Property(property="contact_number", type="string", example="012345678")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Branch created successfully"
     *     )
     * )
     */

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

    /**
     * @OA\Post(
     *     path="/api/branch/update",
     *     summary="Update a branch by ID",
     *     tags={"Branch"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id","name","location","contact_number"},
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="name", type="string", example="Updated Branch"),
     *             @OA\Property(property="location", type="string", example="New Location"),
     *             @OA\Property(property="contact_number", type="string", example="098765432")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Branch updated successfully"
     *     )
     * )
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'             => ['bail', 'required', 'exists:branches,id'],
            'name'           => ['bail', 'required', 'string', 'max:255'],
            'location'       => ['bail', 'required', 'string', 'max:255'],
            'contact_number' => ['bail', 'required', 'string', 'max:20'],
        ]);

        $validationResult = Validation::errorMessage($validator);
        if ($validationResult !== 0) {
            return $validationResult;
        }

        $branch = Branch::find($request->id);
        if ($branch != null) {
            $branch->name = $request->name;
            $branch->location = $request->location;
            $branch->contact_number = $request->contact_number;
            $branch->save();
        }

        return response()->json([
            'status' => 'Success',
            'new_data' => $branch,
            'status_code' => 200
        ]);
    }

    /**
     * @OA\Post (
     *     path="/api/branch/delete",
     *     summary="Delete a branch by ID",
     *     tags={"Branch"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id"},
     *             @OA\Property(property="id", type="integer", example=1)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Branch deleted successfully"
     *     )
     * )
     */
    function delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:branches,id',
        ]);

        $validationResult = Validation::errorMessage($validator);
        if ($validationResult !== 0) {
            return $validationResult;
        }

        $branch = Branch::find($request->id);
        if ($branch != null) {
            $branch->delete();
            return response()->json([
                'status' => 'Success',
                'old_data' => $branch,
                'status_code' => 200
            ]);
        } else {
            return response()->json([
                'status' => 'resource not found !',
                'status_code' => 200
            ]);
        }
    }

    //

}
