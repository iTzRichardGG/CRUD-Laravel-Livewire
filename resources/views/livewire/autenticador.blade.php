<div class="h-screen font-medium text-sm text-stone-900">

    <div class="flex w-screen h-screen">

        @if ($activeDiv == 'iniciar_sesion')
        <div class="w-2/4 h-screen">
            <img class="w-full h-full object-cover" src="{{asset ('img/rana.png')}}" alt="">
        </div>

        <div class="flex justify-center items-center w-2/4 text-lime-700">
            <div class="w-screen">

                <div class="flex justify-center mb-10 w-full">
                    <h1 class="text-2xl font-bold">Iniciar sesión</h1>
                </div>

                <form action="">
                    <div class="flex justify-center mb-10 w-full">
                        <div class="w-2/5">
                            <label class="flex justify-start mb-2" for="correo-registrar">Email</label>
                            <input id="correo-registrar" type="email" class="w-full border rounded-md h-8 p-4 shadow-sm">
                        </div>
                    </div>

                    <div class="flex justify-evenly mb-10 w-full">
                        <div class="w-2/5">
                            <label class="flex justify-start mb-2" for="contrasena-registrar">Contraseña</label>
                            <input id="contrasena-registrar" type="password" class="w-full border rounded-md h-8 p-4 shadow-sm">
                        </div>
                    </div>

                    <div class="flex justify-center items-center text-gray-500">
                        <button type="submit" class="flex items-center text-white bg-green-800 font-medium rounded-lg text-sm px-7 py-2 mr-4">
                            Iniciar sesión
                        </button>
                        <p>
                            ¿No tienes una cuenta? 
                            <a class="underline font-normal" wire:click="switchDiv('registrarse')">registrarse</a>
                        </p>
                    </div>
                
                </form>
                
            </div>
        </div>

        @endif
            

        @if ($activeDiv == 'registrarse')

        <div class="w-2/4 h-screen">
            <img class="w-full h-full object-cover" src="{{asset ('img/rana.png')}}" alt="">
        </div>


        <div class="flex justify-center items-center w-2/4 text-lime-700">
            <div class="w-3/4 ">

                <div>
                    <div class="flex justify-center mb-6 w-full ">
                    <h1 class="text-2xl font-bold">Registrarse</h1>
                </div>

                <form action="">
                    <div class="flex justify-evenly mb-6 w-full">
                        <div class="w-2/5">
                            <label class="flex justify-start mb-2" for="nombre-registrar">Nombre</label>
                            <input id="nombre-registrar" type="text" class="w-full border rounded-md h-8 p-4 shadow-sm">
                        </div>
            
                        <div class="w-2/5">
                            <label class="flex justify-start mb-2" for="apellido-registrar">Username</label>
                            <input id="apellido-registrar" type="text" class="w-full border rounded-md h-8 p-4 shadow-sm">
                        </div>
                    </div>
    
                    <div class="flex justify-center mb-6 w-full">
                        <div class="w-4/5">
                            <label class="flex justify-start mb-2" for="correo-registrar">Email</label>
                            <input id="correo-registrar" type="email" class="w-full border rounded-md h-8 p-4 shadow-sm">
                        </div>
                    </div>
                    
    
                    <div class="flex justify-evenly mb-6 w-full">
                        <div class="w-2/5">
                            <label class="flex justify-start mb-2" for="contrasena-registrar">Contraseña</label>
                            <input id="contrasena-registrar" type="password" class="w-full border rounded-md h-8 p-4 shadow-sm">
                        </div>
                        <div class="w-2/5">
                            <label class="flex justify-start mb-2" for="repetir-contrasena-registrar">Repetir contraseña</label>
                            <input id="repetir-contrasena-registrar" type="password" class="w-full border rounded-md h-8 p-4 shadow-sm">
                        </div>
                    </div>

                    <div class="flex justify-center w-full mb-9 text-gray-500">
                        <input class="w-4" type="checkbox" name="aceptar-correos" id="checkbox-aceptar">
                        <label class="ml-4 w-3/4 font-normal" for="checkbox-aceptar">Quiero recibir correos electrónicos sobre eventos, actualizaciones de productos y anuncios de la empresa.</label>
                    </div>
                      
                    <div class="mb-9 flex justify-center font-normal text-gray-500">
                        <p>
                            Al crear una cuenta, aceptas nuestros 
                            <a class="underline" href="#">términos y condiciones</a>
                            y
                            <a class="underline" href="#">la política de privacidad.</a>
                        </p>
                    </div>

                    <div class="flex justify-center items-center text-gray-500">
                        <button type="submit" class="flex items-center text-white bg-green-800 font-medium rounded-lg text-sm px-7 py-2 mr-4">
                            Registrarse
                        </button>
                        <p>
                            ¿Ya tienes una cuenta? 
                            <a class="underline font-normal" wire:click="switchDiv('iniciar_sesion')">Iniciar sesión</a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
        @endif
        
    </div>
    
</div>

