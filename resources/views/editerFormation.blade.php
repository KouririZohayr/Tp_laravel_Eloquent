@extends('Default')

@section('section')

    
<div class="container lg:w-2/6 max-sm:w-full  sm:w-4/6 mt-10 mx-auto order-2 p-8 shadow-xl shadow-green-500/40">
    <h1 class="text-4xl  font-bold text-red-600 mb-10  ">UPDATE FORMATION </h1>
    <form class="w-full " action="{{ url('/formations'.'/'. $formation[0]->idf )}}" method="POST">
        
      {{ method_field('PATCH') }}
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
         
          <div class="w-full  px-3">
            <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
              Titre
            </label>
            <input name="Titre" value="{{ $formation[0]->Titre }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
              Nombre houres
            </label>
            <input name="NbreHeure" value="{{ $formation[0]->NbreHeure }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="">
           
          </div>
        </div>
       
          
          <div    class="grid grid-cols-2 container  mx-auto gap-8  ">
            <input type="submit" class="bg-green-500 hover:bg-green-700   text-white font-bold py-2   px-4 border border-green-700 rounded"  placeholder="update" >
            <a href="/formations" class="bg-gray-500 hover:bg-gray-400   text-white font-bold py-2  text-center px-4 border border-gray-700 rounded"  >Cancel</a>
        </div>
        </div>
       
      </form>
    </div>
    
@endsection