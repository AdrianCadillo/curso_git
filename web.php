<?php

use App\Http\Controllers\EjemploController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
 
Route::get("/usuarios/data",function(){
  return "data de usuarios";
});
 # ahora vamos a ver una ruta pasandole varios verbos Http
Route::permanentRedirect("/usuario/gestion","/usuarios/data");
# expresiones regulares

Route::get("/producto/{valor}/{categoria}",function($valor,$categoria){
 return "Vamos a editar el producto de código : $valor de categoria $categoria";
})->where(["valor"=>"[0-9]+","categoria"=>"[a-z]+"])
->whereIn("categoria",["bebidas","comidas"]);

Route::get("/estudiante",function(){
 return "Tu eres mayor de edad , así que pasas a la página siguiente ";
})->middleware("edad:19");

   
Route::get("/error_page",function(){
return "error , usted no es mayor de edad";
})->name("error");

/// grupo de rutas con middleware
Route::middleware("edad:12")->group(function(){
 
  Route::get("/docente/create",function(){return 'pasable';});
  Route::get("/docente/editar",function(){return 'pasable';});
});

Route::controller(EjemploController::class)->group(function(){
  Route::get("/ejemplo/visitar","visitar");
  Route::get("/ejemplo/citas","citas");
});
*/
/*
Route::get("/producto",[EjemploController::class,'index'])->name("producto.index");
Route::get("/producto/create",[EjemploController::class,'create'])->name("producto.create");
Route::get("/producto/{id}/{editar}",[EjemploController::class,'editar']);
Route::post("/producto",[EjemploController::class,'save'])->name("producto.save");

Route::get("/producto/{id}",[EjemploController::class,'show'])->name("producto.show");

Route::put("/producto/{id}",[EjemploController::class,'update'])->name("producto.update");

Route::delete("/producto/{id}",[EjemploController::class,'delete'])->name("producto.delete");
*/

Route::resource("insumo",EjemploController::class)->names("producto");