<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Manager;
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

class ManagerController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/manager
     *      summary="Get all the names and photos of managers, and the total number of pages"
     *      tags={"Manager"}
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
        $paginate = ($_GET['page'] - 1) * 5;

        $totalItens = Manager::get()->count();

        $totalPages = ceil($totalItens/5);
        
        $managers = Manager::skip($paginate)->take(5)->select('name', 'photo')->get();
        

        if($managers->isEmpty()){
            return response()->json([
                'message' => 'No managers found',
                'status' => 204
            ]);
        }

        return response()->json([
            'managers' => $managers,
            'status' => 200
        ]);
    }
}
