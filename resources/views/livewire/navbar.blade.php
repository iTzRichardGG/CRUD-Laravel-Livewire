<div class=" h-20 w-full fixed bg-white text-black font-semibold flex" >

    <style>
        input:focus {
            outline: none;
        }

        @font-face {
            font-family: 'Titulo';
            src: url('fonts/big noodle.ttf'),
        }
    
        .titulo{
            font-family: 'Titulo';
        }
        
    </style>

    <div class="flex items-center ml-9 titulo text-3xl ">
        <p>Finesse</p>
    </div>

    <div class="w-full h-full flex justify-end items-center font-light">
       
        <div class="mx-6 hover:border-b-2 hover:border-neutral-950">
            <input class="w-52" type="text" placeholder="Buscar..." name="" id="" >
            <i class="fa-solid fa-magnifying-glass ml-3"></i>
        </div>
        
        <div>
            <p class="mx-6 hover:border-b-2 hover:border-neutral-950 relative" >Carrito
                <i class="fa-solid fa-shopping-cart ml-3"></i>
                <span class="text-xs font-semibold bg-red-500 text-white rounded-full p-1 w-4 h-4 absolute -top-2 -right-2 flex justify-center items-center ">
                    0
                </span>
            </p>
        </div>
        
        <div class="mx-6 cursor-pointer " wire:click="MostrarAjustes" >
            <i class="fa-solid fa-bars"></i>
        </div>
        
    </div>

    <!-- Modal Ajustes -->
    @if($ajustes)
    <div>
        <div class="text-sm font-normal absolute w-72 right-4 top-20 shadow-lg rounded-lg  divide-y divide-neutral-500  bg-gray-50" @click.away="$wire.cerrarAjustes()">

            <!-- Info Cuenta -->
            <div class="flex items-center justify-center p-4">
                <img class="rounded-full w-9 h-9 object-cover mr-3" src="{{asset ($usuarios->imagen) }}" alt="">
                
                <div>
                    <p class="font-medium">{{$usuarios->name}}</p>
                    <p class="text-xs font-light">{{$usuarios->email}}</p>
                </div>
            </div>

            <!-- Ajustes perfil -->
            <div class="">
                <div class="px-4 py-2 mt-2 hover:bg-zinc-200">
                    <a href="#" class=" flex justify-start items-center">
                        <i class="fa-regular fa-user mr-6"></i>
                        <p>Perfil</p>
                    </a>
                </div>
                
                <div class="px-4 py-2 mb-2 hover:bg-zinc-200">
                    <a class="flex justify-start items-center" href="#">                    
                        <i class="fa-brands fa-google mr-6"></i>
                        <p>Cuenta</p>
                    </a>
                </div>
            </div>

            <!-- Preferencias -->
            <div >
                <!-- Aspecto -->
                <div class="px-4 py-2 mt-2 flex justify-between w-full items-center cursor-pointer hover:bg-zinc-200" wire:click="Aspecto">

                    <div class="flex items-center" >
                        <i class="fa-solid fa-circle-half-stroke mr-6"></i>
                        <p>Aspecto: Oscuro</p>
                    </div>

                    <i class="fa-solid fa-chevron-right "></i>
                    
                    @if($Aspecto)
                        <div class="left-0 top-0 bg-stone-800 p-2 rounded-lg shadow-lg">
                            <p class="text-xs">Modo Claro</p>
                            <p class="text-xs">Modo Oscuro</p>
                        </div>
                    @endif

                </div>
                
                <!-- Idioma -->
                <div class=" px-4 py-2 mb-2 hover:bg-zinc-200">
                    <a href="#" class=" flex justify-start items-center">
                        <i class="fa-regular fa-circle-question mr-6"></i>
                        <p>Ayuda</p>
                    </a>
                </div>

            </div>

            <!-- Pie del modal -->
            <div>
                <!-- configuracion -->
                <div class= "px-4 py-2 mt-2 hover:bg-zinc-200">
                    <a href="#" class=" flex justify-start items-center">
                        <i class="fa-solid fa-gear mr-6"></i>
                        <p>Configuracion</p>

                    </a>
                </div>

                <!-- cerrar sesion -->
                <div class="px-4 py-2 mb-2 hover:bg-zinc-200">
                    <a href="#" class=" flex justify-start items-center">
                        <i class="fa-regular fa-circle-question mr-6"></i>
                        <p>Ayuda</p>
                    </a>
                </div>

            </div>
                
        </div>
    </div>
    @endif
   
    
    
</div>


