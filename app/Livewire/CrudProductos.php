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
    public $ModalAñadirProducto = false;
    public $ModalVerProducto = false;
    public $ModalEditarProducto = false;

    // Variable para almacenar el producto seleccionado para ver sus detalles
    public $ProductoSeleccionado;

    // Variable para almacenar el producto buscado 
    public $ProductoBuscado ='';

    // Variables para el ordenamiento de la tabla
    public $sortField = 'nombre'; 
    public $sortDirection = 'asc'; 



// Metodo mount para cargar los datos de las tablas relacionadas al iniciar el componente
    public function mount()  
    {
        $this->marcas = Marcas::all();
        $this->categorias = Categorias::all();
        $this->sizes = Sizes::all();   

        // Cargar los productos con las relaciones de las tablas marcas y categorias
        // orderBy() permite ordenar los registros de la tabla, el primer parametro es el campo por el cual se ordena y el segundo parametro es la direccion de la ordenacion
        $this->productos = Productos::with('categorias', 'marcas')->orderBy($this->sortField, $this->sortDirection)->get(); 
        $this->sizes_productos = Productos_sizes::all();
    }

//Metodo para la busqueda de productos por nombre
    public function busqueda()
    {

        // Buscar los productos que contengan el nombre ingresado en el campo de busqueda
        $this->productos = Productos::where('nombre', 'like', '%'.$this->ProductoBuscado.'%')->orderBy($this->sortField, $this->sortDirection)
        ->get();

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
            
            // attach() es un metodo de Eloquent que crea un nuevo registro en la tabla intermedia
            // El primer parametro es el ID de la talla, el segundo parametro es un array con el stock de la talla
            $producto->sizes()->attach($tallaId, ['stock' => $data['stock']]);
        }

        // Limpiar los campos del formulario despues de guardar
        $this->reset(['nombre', 'descripcion', 'sku', 'precio', 'genero', 'selectedMarca', 'selectedCategoria', 'stockSizes_S', 'stockSizes_M', 'stockSizes_L', 'stockSizes_XL']);

        // Actualizar la lista de productos ordenada para que se muestre el nuevo producto en la tabla
        $this->productos = Productos::orderBy($this->sortField, $this->sortDirection)->get(); 
    }
    

// Metodo el modal sobre la informacion de cada producto
    public function VerProducto($id)
    {

        $this->ProductoSeleccionado = Productos::find($id);
        $this->ModalVerProducto = true;

        // Cargar los datos del producto seleccionado en las variables para que se muestren en el modal y tengan su valor por defecto
        $this->nombre = $this->ProductoSeleccionado->nombre;
        $this->descripcion = $this->ProductoSeleccionado->descripcion;
        $this->sku = $this->ProductoSeleccionado->sku;
        $this->precio = $this->ProductoSeleccionado->precio;
        $this->genero = $this->ProductoSeleccionado->genero;
        $this->selectedMarca = $this->ProductoSeleccionado->marca_id;
        $this->selectedCategoria = $this->ProductoSeleccionado->categoria_id;
        
        foreach ($this->ProductoSeleccionado->sizes as $size) {
            if ($size->nombre == 'S') {
                $this->stockSizes_S = $size->pivot->stock;
            }
            if ($size->nombre == 'M') {
                $this->stockSizes_M = $size->pivot->stock;
            }
            if ($size->nombre == 'L') {
                $this->stockSizes_L = $size->pivot->stock;
            }
            if ($size->nombre == 'XL') {
                $this->stockSizes_XL = $size->pivot->stock;
            }
        }
    }

// Metodo para la apertura del modal de edicion y para el cierre 
    public function ModalEditar()
    {
        $this->ModalEditarProducto = true;
        $this->ModalVerProducto = false;
    }

// Metodo para actualizar los datos editados del producto
    public function EditarProducto($id)
    {
        $producto = Productos::find($id);

        $producto->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'sku' => $this->sku,
            'precio' => $this->precio,
            'genero' => $this->genero,
            'marca_id' => $this->selectedMarca,
            'categoria_id' => $this->selectedCategoria,
        ]);

        // Array que asocia los IDs de las tallas con sus respectivos valores de stock
        $tallasYStock = [
            1 => ['stock' => $this->stockSizes_S],
            2 => ['stock' => $this->stockSizes_M],
            3 => ['stock' => $this->stockSizes_L],
            4 => ['stock' => $this->stockSizes_XL],
        ];

        // Bucle donde itera en el array donde "$tallaId" es el ID de la talla y $data es el array con el stock
        foreach ($tallasYStock as $tallaId => $data) {

            //updateExistingPivot() es un metodo de Eloquent que actualiza un registro en la tabla intermedia
            //El primer parametro es el ID de la talla para identificar la fila en la tabla, el segundo parametro es el array con los datos a actualizar
            $producto->sizes()->updateExistingPivot($tallaId, ['stock' => $data['stock']]);
        }

        // Limpiar los campos del formulario despues de guardar
        $this->reset(['nombre', 'descripcion', 'sku', 'precio', 'genero', 'selectedMarca', 'selectedCategoria', 'stockSizes_S', 'stockSizes_M', 'stockSizes_L', 'stockSizes_XL']);

        // Actualizar la lista de productos ordenada para que se muestre el producto actualizado en la tabla
        $this->productos = Productos::orderBy($this->sortField, $this->sortDirection)->get();

        // Cerrar el modal de edicion   
        $this->ModalEditarProducto = false;
    }

// Metodo para eliminar un producto
    public function delete($id)
    {
        $producto = Productos::find($id);
        $producto->delete();
        $this->productos = Productos::all();
    }


    public function render()
    {
        return view('livewire.crud-productos',);
    }
}
