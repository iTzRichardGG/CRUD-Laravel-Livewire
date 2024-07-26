<div class="h-24 font-medium bg-stone-950">

    <!-- Contenido -->
     <div class=" flex justify-between items-center h-full">

        <!-- logo -->
        <div class="ml-9 flex items-center" wire:click="Aspecto" >  
            <i class="fi fi-brands-mailchimp text-3xl mr-4"></i>
        </div>


        <!-- buscador -->
        <div >
            <input class="w-80 rounded-lg border-stone-800 p-2 shadow-sm mx-5 bg-stone-800" type="text" placeholder="buscar" >
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>

        <!-- Imagen de perfil-->
        <div class="mr-9 z-10">
            <img wire:click="MostrarAjustes" class="rounded-full w-9 h-9 object-cover " src="{{asset ('imagenes_perfil/perfil.JPG')}}" alt="">

            <!-- Modal Ajustes -->
            @if($ajustes)
            <div class="text-sm font-normal absolute w-72 right-0 top-12 shadow-lg rounded-lg  divide-y divide-neutral-500  bg-stone-800" @click.away="$wire.cerrarAjustes()">

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
                    <div class="hover:bg-zinc-700 px-4 py-2 mt-2">
                        <a href="#" class=" flex justify-start items-center">
                            <i class="fa-regular fa-user mr-6"></i>
                            <p>Perfil</p>
                        </a>
                    </div>
                    
                    <div class="hover:bg-zinc-700 px-4 py-2 mb-2">
                        <a class="flex justify-start items-center" href="#">                    
                            <i class="fa-brands fa-google mr-6"></i>
                            <p>Cuenta</p>
                        </a>
                    </div>
                </div>

                <!-- Preferencias -->
                <div >
                    <!-- Aspecto -->
                    <div class="hover:bg-zinc-700 px-4 py-2 mt-2 flex justify-between w-full items-center cursor-pointer" wire:click="Aspecto">

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
                    <div class="hover:bg-zinc-700 px-4 py-2 mb-2">
                        <a href="#" class=" flex justify-start items-center">
                            <i class="fa-regular fa-circle-question mr-6"></i>
                            <p>Ayuda</p>
                        </a>
                    </div>

                </div>

                <!-- Pie del modal -->
                <div>
                    <!-- configuracion -->
                    <div class="hover:bg-zinc-700 px-4 py-2 mt-2">
                        <a href="#" class=" flex justify-start items-center">
                            <i class="fa-solid fa-gear mr-6"></i>
                            <p>Configuracion</p>

                        </a>
                    </div>

                    <!-- cerrar sesion -->
                    <div class="hover:bg-zinc-700 px-4 py-2 mb-2">
                        <a href="#" class=" flex justify-start items-center">
                            <i class="fa-regular fa-circle-question mr-6"></i>
                            <p>Ayuda</p>
                        </a>
                    </div>

                </div>
                    
            </div>
            @endif
        </div>
     </div>

</div>