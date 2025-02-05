<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(12); // Ajusta el número de elementos por página según sea necesario
        return response()->json($productos);
    }
}