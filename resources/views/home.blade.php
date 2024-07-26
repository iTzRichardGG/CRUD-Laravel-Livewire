@extends('layouts.main')

@section('home')

<style>
    .imagen{
        background-image: url("{{asset ('img/fondo-navbar.jpg')}}");
        background-size: cover;
        background-position: center;
    }

    @font-face {
        font-family: 'Titulo';
        src: url('fonts/big noodle.ttf'),
    }

    .titulo{
        font-family: 'Titulo';
    }

    .height-600px{
        height: 600px;
    }
</style>


<div class="height-600px imagen">
  
     <div  class=" flex justify-center items-center h-full">
        <div class="titulo text-center text-7xl font-bold ">
            <p>Calidad y elegancia </p>
            <p>en un solo lugar</p>
        </div>
     </div>

</div>

<!-- <div class="bg-neutral-950 w-48 h-52 rounded-xl">
    <div class="flex justify-center">
        <img class=" w-full h-32 object-cover rounded-md " src="{{asset ('img/pizza.avif')}}" alt="">
    </div>
</div> -->




@endsection