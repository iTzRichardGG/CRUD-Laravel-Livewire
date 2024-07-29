<div>

<!--Tabla con los productos------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="flex justify-center items-center h-screen">

        <div class="w-3/4 h-3/4  bg-white rounded-xl shadow divide-y-2">

            <div class="p-4 bg-slate-200">
                
                <div class="flex justify-between items-center">

                    <div class="font-bold text-lg">
                        <p>Administracion de productos</p>
                    </div>

                    <div>
                        <input type="text" class="h-9 pr-20 p-3 border rounded shadow" placeholder="Buscar producto" wire:model="search">

                        <button class="px-1 py-1 rounded-md bg-blue-500 text-white font-semibold" wire:click="buscar">
                            <i class="fa-solid fa-search mx-1"></i>
                        </button>
                    </div>
                    
                    <button class="px-5 py-2 ml- rounded-xl bg-blue-500 text-white font-semibold hover:bg-blue-600" wire:click="$set('ModalCrear', true)" >
                        Agregar nuevo producto <i class="fa-solid fa-folder-plus mx-1"></i>
                    </button>
                </div>

            </div>
    
            <div class="h-5/6 w-full overflow-y-auto">

                <table class="w-full table-auto divide-y-2"> 
                    <thead>
                        <tr class="font-bold">
                            <th scope="col" class="px-20 py-6 text-left">Nombre</th>
                            <th scope="col" class="px-20 py-6 text-left">Categoria</th>
                            <th scope="col" class="px-20 py-6 text-left">Marca</th>
                            <th scope="col" class="px-20 py-6 text-left">Precio</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody class="divide-y-2">
                        @foreach ($productos as $item)
                        <tr class="hover:bg-gray-100 text-sm" wire:key="post-{{$item->id}}">
                            <td class="px-20 py-4">{{ $item->nombre }}</td>
                            <td class="px-20 py-4">{{ $item->categorias->nombre }}</td>
                            <td class="px-20 py-4">{{$item->marcas->nombre}}</td>
                            <td class="px-20 py-4">{{ $item->precio }}</td>
                            <td class="px-7 py-4">
                                <div class="flex text-base">
                                    <div class="px-3 py-2 mx-2 rounded-lg text-green-600 " wire:click="VerProducto({{$item->id}})">  <i class="cursor-pointer hover:text-green-800 fa-regular fa-eye"></i>  </div>
                                    <div class="px-3 py-2 mx-2 rounded-lg text-red-600 " wire:click="delete"> <i class="cursor-pointer hover:text-red-800 fa-regular fa-trash-can"></i>  </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
          
        </div>

    </div>


<!--Modal para ver informacion del producto------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    @if ($ModalVerProducto)
    <div class="h-full w-full flex justify-center items-center fixed inset-0 bg-white bg-opacity-70">

        <div class="w-1/3 h-4/5 rounded-lg border-2 bg-white overflow-y-auto">

            <div class="flex items-center">
                <div class="w-1/2 h-2/4 m-4 ">
                    @if ($ProductoSeleccionado->imagen)
                        <img src="{{$ProductoSeleccionado->imagen}}" alt="">
                    @else
                        <img class="rounded" src="{{asset ('img-productos/predeterminada.jpg')}}" alt="">
                    @endif
                </div>

                <div class="overflow-hidden">
                    <p class="my-5 mr-4 text-sm"><i class="font-bold">sku:</i> {{$ProductoSeleccionado->sku}}</p>
                    <p class="my-5 mr-4 text-sm"><i class="font-bold">Nombre:</i> {{$ProductoSeleccionado->nombre}}</p>
                    <p class="my-5 mr-4 text-sm"><i class="font-bold">Genero:</i> {{$ProductoSeleccionado->genero}}</p>
                    <p class="my-5 mr-4 text-sm"><i class="font-bold">Categoria:</i> {{$ProductoSeleccionado->categorias->nombre}}</p>
                    <p class="my-5 mr-4 text-sm"><i class="font-bold">Marca:</i> {{$ProductoSeleccionado->marcas->nombre}}</p>
                    <p class="my-5 mr-4 text-sm"><i class="font-bold">Precio:</i> {{$ProductoSeleccionado->precio}}</p>
                </div>
            </div>

            <div class="pt-3">
                <p class="mx-7 py-5 text-justify">{{$ProductoSeleccionado->descripcion}}</p>

                <div class="mx-5 py-4">
                    <p class="font-bold pb-4">Stock:</p>
                    <div class="flex justify-evenly">
                        @foreach ($ProductoSeleccionado->sizes as $item)
                            <p> <i class="font-bold">{{$item->nombre}}:</i> {{$item->pivot->stock}}</p>
                        @endforeach
                    </div>
                </div>

                <div class="pt-9 pb-4 flex justify-center items-center">
                    <button class="mx-4 text-white bg-red-600  p-2 rounded-xl" wire:click="$set('ModalVerProducto', false)">
                        <p>Salir<i class="ml-2 mx-1 fa-solid fa-xmark"></i></p>
                    </button>
    
                    <button class="mx-4 text-white bg-teal-500 p-2 rounded-xl " wire:click="EditarProducto">
                        <p>Editar<i class="ml-2 mx-1 fa-regular fa-pen-to-square"></i></p>
                    </button>
                </div>
            </div>
            
        </div>
    </div>
    @endif
    
    

<!--Modal para crear nuevo producto------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    @if ($ModalCrear)
    <div class="w-full h-full flex justify-center fixed items-center bg-opacity-70 bg-white inset-0">
        
        <div class="rounded-md p-10 w-1/2 h-3/4 border shadow overflow-y-auto bg-white">
            
            <form wire:submit="save">

                <!-- Nombre -->
                <div class="h-4 mb-16">
                    <p>Nombre del producto</p>
                    <input wire:model="nombre" type="text" class="w-full border rounded h-9 p-3 shadow" required>
                </div>

                <!-- Descripción -->
                <div class=" h-4 mb-28">
                    <p>Descripción</p>
                    <textarea wire:model="descripcion" class="w-full border rounded p-3 shadow" rows="2" required></textarea>              
                </div>

                <!-- Sku -->
                <div class="h-4 mb-16">
                    <p>Sku</p>
                    <input wire:model="sku" type="text" class="w-full border rounded h-9 p-3 shadow" required>
                </div>

                <!-- Precio -->
                <div class="h-4 mb-16">
                    <p>Precio</p>
                    <input wire:model="precio" type="number" class="w-full border rounded h-9 p-3 shadow" step="any" required>
                </div>

                <!-- Imagen -->
                <div class="h-4 mb-16">
                    <p>Imagen</p>
                    <input type="file" class="w-full border rounded h-15 p-3 shadow">
                </div>

                <!-- Stock de cada talla-->
                <div class="h-24 mt-28 ">
                    <div class="flex justify-evenly overflow-x-auto">

                        <!-- Bucle para iterar sobre cada talla en la base de datos -->
                        @foreach($sizes as $item) 
                        <div class="flex items-center">
                            <label class="mx-2" for="Size_{{$item->id}}">{{$item->nombre}}</label>
                            <input type="number" class="mx-2 w-14 h-8 border rounded p-2 shadow" wire:model="stockSizes_{{$item->nombre}}" id="size_{{$item->id}}" min="0"  required>
                        </div>
                        @endforeach

                    </div>
                </div>

                <!--Escoger la marca, Categoria y Genero -->
                <div class="flex justify-center h-4 mb-24 text-center">

                    <!-- Marca -->
                    <div class="w-1/2">
                        <p>Marca</p>
                        <select class="w-3/6 border rounded h-11 p-2 shadow" wire:model="selectedMarca" required>

                            <option value=""></option> <!-- para opcion predeterminada -->

                            @foreach ($marcas as $item)
                                <option value="{{$item->id}}" >{{ $item->nombre }}</option>
                            @endforeach

                        </select>
                    </div>
        
                    <!-- Categoria -->
                    <div class="w-1/2">
                        <p>Categoria</p>
                        <select class="w-3/6 border rounded h-11 p-2 shadow" wire:model="selectedCategoria" required>

                            <option value=""></option> <!-- para opcion predeterminada -->

                            @foreach ($categorias as $item)
                                <option value="{{$item->id}}">{{ $item->nombre }}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <!-- Genero -->
                    <div class="w-1/2">
                        <p>Genero</p>

                        <select class="w-3/6 border rounded h-11 p-2 shadow" wire:model="genero" required>
                            <option value=""></option> <!-- para opcion predeterminada -->
                            <option value="hombre">Hombre</option>
                            <option value="mujer">Mujer</option>
                            <option value="unisex">Unisex</option>
                        </select>
                    </div>
                    
                </div>
                
                <!-- Botones de guardar y cerrar -->
                <div class="flex justify-end">
                    <button type="button" class="mx-3 p-3 w-20 rounded-xl text-white bg-red-600 hover:bg-red-800" wire:click="$set('ModalCrear', false)">Cerrar <i class="fa-solid fa-xmark"></i></button>
                    <button class="mx-3 p-3 rounded-xl text-white bg-blue-600 hover:bg-blue-800">Guardar   <i class="fa-solid fa-circle-plus"></i></button>
                </div>
               
            </form>

        </div>

    </div>
    @endif

</div>