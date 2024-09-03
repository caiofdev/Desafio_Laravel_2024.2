<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *  title="Vertex API",
 *  version="1.0",
 *  contact={
 *      "email":"caio.reis@codejr.com.br"
 *  }
 * )
 */

class AdminController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/admin
     *      summary="Get all the names and photos of administrators, and the total number of pages"
     *      tags={"Admin"}
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      example="Example Name"
     *                  ),
     *                  @OA\Propery(
     *                      property="photo",
     *                      type="string",
     *                      example="/files/pfpExample"
     *                  ),
     *              )
     *          )
     *      )
     * )
     */
    public function index(){
        if(!is_int($_GET['page'])){
            return response()->json([
                'message' => 'The page parameter must be mandatory and an integer',
                'status' => 204
            ]);
        }

        $paginate = ($_GET['page'] - 1) * 5;

        $totalItens = Admin::get()->count();

        $totalPages = ceil($totalItens/5);
        
        $admins = Admin::skip($paginate)->take(5)->select('name', 'photo')->get();
        
        if($admins->isEmpty()){
            return response()->json([
                'message' => 'No administrators found',
                'status' => 204
            ]);
        }

        return response()->json([
            'admins' => $admins,
            'total_pages' => $totalPages,
            'status' => 200
        ]);
    }
}
