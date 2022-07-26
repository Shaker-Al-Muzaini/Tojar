<?php
use App\Http\Controllers\Api_controller\apiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum','checkPassword'])->get('/user', static function (Request $request) {
});
    Route::group(['middleware'=>['api','checkPassword'],'namespace'=>'Api'], static function (){
        Route::post('get_date',[apiController::class,'index']);
        Route::post('get_date_By_ID',[apiController::class,'getID']);
        Route::post('change_form_status',[apiController::class,'changeStatus']);

    });




