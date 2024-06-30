<div class="h-24 font-medium">
    
    <!-- Fondo con desenfoque -->
    <div class="relative inset-0 blur-sm bg-transparent"></div>

    <!-- Contenido -->
     <div class="border flex justify-between items-center relative h-full">

        <div>
            <div class="ml-8 z-10">
                <button wire:click="MostrarAjustes"><i class="fa-solid fa-bars"></i></button>
            </div>

            @if($ajustes)
            <div class="absolute top-16 bg-w shadow-lg rounded-lg p-2">
                <ul>
                    <li><a href="#">Perfil</a></li>
                    <li><a href="#">Configuración</a></li>
                    <li><a href="#">Cerrar sesión</a></li>
                </ul>
            </div>
            @endif
         </div>
    
        <div >
            <input class="w-80 rounded-lg border p-2 shadow-sm mx-5 " type="text" placeholder="buscar" >
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
    
        <div class="mr-8 z-10 relative">
            <img class="rounded-full w-9 h-9 object-cover" src="{{asset ('imagenes_perfil/perfil.JPG')}}" alt="">
        </div>
     </div>

</div>