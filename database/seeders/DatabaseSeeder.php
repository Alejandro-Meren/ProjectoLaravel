<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Servicio;
use App\Models\Producto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $usuarios = [
            ['name' => 'Alejandro', 'email' => 'alejandro@example.com', 'password' => bcrypt('12345678'), 'rol' => 'admin'],
            ['name' => 'Maria', 'email' => 'maria@example.com', 'password' => bcrypt('12345678')],
            ['name' => 'Jose', 'email' => 'jose@example.com', 'password' => bcrypt('12345678')],
        ];

        foreach ($usuarios as $usuario) {
            User::create($usuario);
        }

        // Cliente::factory(10)->create();
        $servicios = [
            ['nombre' => 'Corte de Cabello', 'precio' => 15.00],
            ['nombre' => 'Tinte de Cabello', 'precio' => 40.00],
            ['nombre' => 'Peinado', 'precio' => 25.00],
            ['nombre' => 'Manicura', 'precio' => 20.00],
            ['nombre' => 'Pedicura', 'precio' => 25.00],
            ['nombre' => 'Depilación con Cera', 'precio' => 30.00],
            ['nombre' => 'Tratamiento Capilar', 'precio' => 50.00],
        ];

        foreach ($servicios as $servicio) {
            Servicio::create($servicio);
        }


        $productos = [
            ['nombre' => 'Shampoo', 'precio' => 15.00, 'stock' => 10, 'descripcion' => 'Shampoo para todo tipo de cabello.'],
            ['nombre' => 'Acondicionador', 'precio' => 20.00, 'stock' => 15, 'descripcion' => 'Acondicionador suave para cabello sedoso.'],
            ['nombre' => 'Gel para el cabello', 'precio' => 10.00, 'stock' => 20, 'descripcion' => 'Gel de fijación fuerte para peinados duraderos.'],
            ['nombre' => 'Cera para el cabello', 'precio' => 12.00, 'stock' => 18, 'descripcion' => 'Cera moldeadora para estilos versátiles.'],
            ['nombre' => 'Laca para el cabello', 'precio' => 18.00, 'stock' => 12, 'descripcion' => 'Laca de fijación extra fuerte para peinados perfectos.'],
            ['nombre' => 'Espuma para el cabello', 'precio' => 16.00, 'stock' => 14, 'descripcion' => 'Espuma voluminizadora para cabellos finos.'],
            ['nombre' => 'Aceite para el cabello', 'precio' => 25.00, 'stock' => 8, 'descripcion' => 'Aceite nutritivo para cabellos secos y dañados.'],
            ['nombre' => 'Mascarilla capilar', 'precio' => 30.00, 'stock' => 10, 'descripcion' => 'Mascarilla reparadora intensiva para cabellos maltratados.'],
            ['nombre' => 'Serum capilar', 'precio' => 35.00, 'stock' => 7, 'descripcion' => 'Serum de brillo para un acabado sedoso.'],
            ['nombre' => 'Tinte para el cabello', 'precio' => 40.00, 'stock' => 25, 'descripcion' => 'Tinte permanente en variedad de tonos.'],
            ['nombre' => 'Decolorante', 'precio' => 45.00, 'stock' => 15, 'descripcion' => 'Decolorante profesional para aclarar el cabello.'],
            ['nombre' => 'Protector térmico', 'precio' => 22.00, 'stock' => 13, 'descripcion' => 'Spray protector contra el calor de herramientas de peinado.'],
            ['nombre' => 'Spray fijador', 'precio' => 18.00, 'stock' => 16, 'descripcion' => 'Spray de fijación media para peinados naturales.'],
            ['nombre' => 'Peine', 'precio' => 5.00, 'stock' => 30, 'descripcion' => 'Peine de dientes anchos para todo tipo de cabello.'],
            ['nombre' => 'Cepillo', 'precio' => 10.00, 'stock' => 25, 'descripcion' => 'Cepillo desenredante para un peinado suave.'],
            ['nombre' => 'Tijeras de peluquería', 'precio' => 50.00, 'stock' => 8, 'descripcion' => 'Tijeras profesionales de acero inoxidable.'],
            ['nombre' => 'Máquina de cortar cabello', 'precio' => 60.00, 'stock' => 6, 'descripcion' => 'Máquina eléctrica con accesorios para cortes precisos.'],
            ['nombre' => 'Capa de peluquería', 'precio' => 15.00, 'stock' => 20, 'descripcion' => 'Capa impermeable para protección durante el corte.'],
            ['nombre' => 'Toallas', 'precio' => 8.00, 'stock' => 40, 'descripcion' => 'Pack de toallas suaves y absorbentes.'],
            ['nombre' => 'Guantes', 'precio' => 5.00, 'stock' => 50, 'descripcion' => 'Guantes desechables para aplicación de tintes.'],
            ['nombre' => 'Bata de peluquería', 'precio' => 20.00, 'stock' => 15, 'descripcion' => 'Bata cómoda para clientes durante el servicio.'],
            ['nombre' => 'Espejo de mano', 'precio' => 12.00, 'stock' => 18, 'descripcion' => 'Espejo con mango para ver el peinado desde todos los ángulos.'],
            ['nombre' => 'Secador de cabello', 'precio' => 55.00, 'stock' => 10, 'descripcion' => 'Secador profesional de alta potencia.'],
            ['nombre' => 'Plancha de cabello', 'precio' => 45.00, 'stock' => 12, 'descripcion' => 'Plancha cerámica para alisados perfectos.'],
            ['nombre' => 'Rizador de cabello', 'precio' => 40.00, 'stock' => 11, 'descripcion' => 'Rizador con control de temperatura para rizos definidos.'],
            ['nombre' => 'Difusor de secador', 'precio' => 20.00, 'stock' => 14, 'descripcion' => 'Difusor para realzar rizos y ondas naturales.'],
            ['nombre' => 'Pinzas para el cabello', 'precio' => 8.00, 'stock' => 35, 'descripcion' => 'Set de pinzas para seccionar el cabello.'],
            ['nombre' => 'Ganchos para el cabello', 'precio' => 6.00, 'stock' => 45, 'descripcion' => 'Pack de ganchos invisibles para peinados elaborados.'],
            ['nombre' => 'Cinta para el cabello', 'precio' => 4.00, 'stock' => 30, 'descripcion' => 'Cinta elástica para sujetar el cabello.'],
            ['nombre' => 'Diadema', 'precio' => 7.00, 'stock' => 22, 'descripcion' => 'Diadema ajustable para mantener el cabello en su lugar.'],
            ['nombre' => 'Banda para el cabello', 'precio' => 5.00, 'stock' => 28, 'descripcion' => 'Banda elástica para deportes y actividades.'],
            ['nombre' => 'Gorro de ducha', 'precio' => 3.00, 'stock' => 40, 'descripcion' => 'Gorro impermeable para proteger el cabello en la ducha.'],
            ['nombre' => 'Gorro térmico', 'precio' => 10.00, 'stock' => 16, 'descripcion' => 'Gorro para tratamientos capilares con calor.'],
            ['nombre' => 'Gorro de tinte', 'precio' => 8.00, 'stock' => 25, 'descripcion' => 'Gorro reutilizable para aplicación de tintes.'],
            ['nombre' => 'Bowl para tinte', 'precio' => 5.00, 'stock' => 30, 'descripcion' => 'Bowl de plástico resistente para mezclar tintes.'],
            ['nombre' => 'Brocha para tinte', 'precio' => 4.00, 'stock' => 35, 'descripcion' => 'Brocha de cerdas suaves para aplicación precisa de tintes.'],
            ['nombre' => 'Removedor de tinte', 'precio' => 12.00, 'stock' => 18, 'descripcion' => 'Producto para eliminar manchas de tinte en la piel.'],
            ['nombre' => 'Acondicionador sin enjuague', 'precio' => 18.00, 'stock' => 20, 'descripcion' => 'Acondicionador ligero para uso diario sin enjuague.'],
            ['nombre' => 'Spray desenredante', 'precio' => 15.00, 'stock' => 22, 'descripcion' => 'Spray para facilitar el cepillado y desenredar.'],
            ['nombre' => 'Tratamiento anticaída', 'precio' => 35.00, 'stock' => 12, 'descripcion' => 'Tratamiento fortalecedor para prevenir la caída del cabello.'],
            ['nombre' => 'Tratamiento anti-frizz', 'precio' => 30.00, 'stock' => 15, 'descripcion' => 'Tratamiento para controlar el frizz y el encrespamiento.'],
            ['nombre' => 'Tratamiento hidratante', 'precio' => 25.00, 'stock' => 18, 'descripcion' => 'Tratamiento intensivo para cabellos secos y deshidratados.'],
            ['nombre' => 'Tratamiento reparador', 'precio' => 28.00, 'stock' => 16, 'descripcion' => 'Tratamiento para reparar cabellos muy dañados.'],
            ['nombre' => 'Tratamiento nutritivo', 'precio' => 32.00, 'stock' => 14, 'descripcion' => 'Tratamiento rico en nutrientes para fortalecer el cabello.'],
            ['nombre' => 'Ampollas capilares', 'precio' => 40.00, 'stock' => 10, 'descripcion' => 'Ampollas concentradas para tratamientos intensivos.'],
            ['nombre' => 'Elixir capilar', 'precio' => 45.00, 'stock' => 8, 'descripcion' => 'Elixir multifuncional para brillo y suavidad extrema.'],
        ];
    
        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}