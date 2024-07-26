<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Marcas;
use App\Models\Categorias;
use App\Models\Sizes;
use App\Models\Productos;
use App\Models\Productos_sizes;


class CrudProductos extends Component
{
    // variables para almacenar los datos del producto
    public $nombre, $descripcion, $sku, $precio, $genero, $selectedMarca, $selectedCategoria;
    
    // variables para almacenar los datos de la BD al iniciar el componente
    public $marcas, $categorias, $sizes, $productos, $sizes_productos;

    // variables para almacenar el stock  de cada talla a la hora de guardar cada producto
    public $stockSizes_S, $stockSizes_M, $stockSizes_L, $stockSizes_XL;

    // Variables para controlar la apertura y cierre de modales
    public $ModalCrear = false;
    public $ModalVer = false;

    // Variable para almacenar el producto seleccionado para ver sus detalles
    public $ProductoSeleccionado;


// Metodo mount para cargar los datos de las tablas relacionadas al iniciar el componente
    public function mount()  
    {
        $this->marcas = Marcas::all();
        $this->categorias = Categorias::all();
        $this->sizes = Sizes::all();   
        $this->productos = Productos::with('categorias', 'marcas')->get(); // Cargar los productos con la relacion de las tablas marcas y categorias
        $this->sizes_productos = Productos_sizes::all();

    }

// Metodo para guardar el producto
    public function save()
    {

        // Guardado de datos para la tabla productos
        $producto = Productos::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'sku' => $this->sku,
            'precio' => $this->precio,
            'genero' => $this->genero,
            'marca_id' => $this->selectedMarca,
            'categoria_id' => $this->selectedCategoria,
        ]);

        // Guardado del stock para cada talla del producto (las claves representan el id de la talla, y el valor representa el stock)
        $tallasYStock = [
            1 => ['stock' => $this->stockSizes_S],
            2 => ['stock' => $this->stockSizes_M],
            3 => ['stock' => $this->stockSizes_L],
            4 => ['stock' => $this->stockSizes_XL],
        ];

        // bucle para guardar los registros de cada talla con su stock en la tabla intermedia "productos_sizes"
        foreach ($tallasYStock as $tallaId => $data) {
            
            $producto->sizes()->attach($tallaId, ['stock' => $data['stock']]);
        }

        // Limpiar los campos del formulario despues de guardar
        $this->reset(['nombre', 'descripcion', 'sku', 'precio', 'genero', 'selectedMarca', 'selectedCategoria', 'stockSizes_S', 'stockSizes_M', 'stockSizes_L', 'stockSizes_XL']);

        $this->productos = Productos::all();
        $this->sizes_productos = Productos_sizes::all();
    }
    


    public function VerProducto($id)
    {

        $this->ProductoSeleccionado = Productos::find($id);
        $this->ModalVer = true;
        
    }

    public function delete()
    {
        dd('eliminar');
    }

    public function render()
    {
        return view('livewire.crud-productos',);
    }
}
