<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>
<body class="{{--  bg-slate-200  --}} bg-sky-200">
    <form action="{{ route('logout') }}" method="POST">
        @csrf()
        <button  type="submit" class="bg-sky-500  active:bg-sky-600 font-bold uppercase text-base px-8 py-3 rounded shadow-md hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
            logout
        </button>
       
    </form>
    <div class="">
        <h1 class="text-6xl text-center font-normal leading-normal mt-0 mb-2 text-red-800">Welcome {{ $username }}</h1>
    </div>
    <div class="container mx-auto mt-10">
        <div class=" grid  max-sm:grid-cols-1  grid-cols-2 gap-10   ">
        
            @foreach($formations as $formation)   
            
                <div class=" border-2 border-sky-400 p-6 m-6 rounded-md ">
                        <h2 class="text-5xl text-center font-normal leading-normal mt-0 mb-2 text-indigo-800">
                           Titre : {{ $formation->Titre }}
                        </h2>
                        <h3 class="text-4xl font-normal text-center leading-normal mt-0 mb-2 text-blue-800">
                          Nombre hours : {{ $formation->NbreHeure }}
                        </h3>
                        <a href="formations/{{ $formation->idf }}/edit" class="bg-green-500   active:bg-sky-600 font-bold uppercase text-base px-8 py-3 rounded shadow-md hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                            Modifier 
                        </a>
                        <form class="inline-block" action="{{ route('formations.destroy',['formation' => $formation->idf])}}" method="POST" >
                            @method('DELETE')
                              @csrf()
                            <button  type="submit" class="bg-red-500  active:bg-sky-600 font-bold uppercase text-base px-8 py-3 rounded shadow-md hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" >
                                supprimer
                            </button >
                          </form>
                       <div  class=" inline-block ">
                            <a href={{ "/formations/classes".'/'.$formation->idf}} name="afficheClasse" class="bg-sky-500  active:bg-sky-600 font-bold uppercase text-base px-8 py-3 rounded shadow-md hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" >afficher les Classes de cette Formation</a>
                       </div>
                </div>
            @endforeach
        <div>
        </div>
 
        </div>
        <div class="flex justify-center"> 
            <a href="formations/create" class="bg-sky-500  active:bg-sky-600 font-bold uppercase text-base px-8 py-3 rounded shadow-md hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                 AJOUTER FORMATION
            </a>
        </div>
    </div>
    
</body>
</html>