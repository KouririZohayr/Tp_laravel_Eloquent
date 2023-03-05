@extends('Default')
@section('section')
    <div class="container lg:w-2/6 max-sm:w-full  sm:w-4/6 mt-10 mx-auto order-2 p-8 shadow-xl shadow-blue-500/40  " >
        <h1 class="text-4xl  font-bold text-red-600 mb-8 ">AJOUTER FORMATION </h1>
        <form class="w-full " action="{{ url('etudiants')}}" method="POST">
            {{ csrf_field() }}
            <div class="flex flex-wrap -mx-3 mb-6">
              
              <div class="w-full  px-3">
                <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  NOM
                </label>
                <input name="nom" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full  px-3">
                <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  PRENOM
                </label>
                <input name="prenom" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full  px-3">
                <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  Address
                </label>
                <input name="adresse" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full  px-3">
                <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  Date de naissance
                </label>
                <input type="date" name="dateNaissance" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full  px-3">
                <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  ID class
                </label>
                <select name="idclasse" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" >
                  @foreach($classes as $classe)
                    <option value="{{ $classe->idc }}">{{ $classe->libelle }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full  px-3">
                <label  class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  POINT
                </label>
                <input name="points"  class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
              </div>
            </div>
            <div class="grid grid-cols-2 container  mx-auto gap-8  ">
                <input type="submit" class="bg-blue-500 hover:bg-blue-700   text-white font-bold py-2   px-4 border border-blue-700 rounded"   >
                <a href="/etudiants" class="bg-gray-500 hover:bg-gray-400   text-white font-bold py-2  text-center px-4 border border-gray-700 rounded"  >Cancel</a>
            </div>
            </div>
            
        
            
          </form>
        </div>
@endsection