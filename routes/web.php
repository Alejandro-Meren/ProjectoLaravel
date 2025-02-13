<?php
// filepath: /c:/Users/aleme/OneDrive/Escritorio/ProyectoLaravel/routes/web.php


use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'userName' => Auth::check() ? Auth::user()->name : 'Invitado',
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->rol != 'admin') {
            return redirect('citas');
        } 
        return Inertia::render('Dashboard', ['clientes' => Cliente::get()]);
    })->name('dashboard');
});


Route::get('/citas', function () {
    return Inertia::render('Citas', [
      'numCitas' => \App\Models\Cita::count(),
    ]);
})->name('citas');


Route::get('/productos', function () {
    return Inertia::render('Productos', [
        'numProductos' => \App\Models\Producto::count(),
    ]);
})->name('productos');

Route::get('/estadisticas', function () {
    if (Auth::user()->rol != 'admin') {
        return redirect('dashboard');
    } 
    return Inertia::render('Estadisticas', [
        'numUsuarios' => \App\Models\User::count(),
        'numCitas' => \App\Models\Cita::count(), // Añade el total de citas
        'numServicios' => \App\Models\Servicio::count(), // Añade el total de productos
    ]);
})->name('estadisticas');