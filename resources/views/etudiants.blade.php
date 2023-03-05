<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>


        <!-- Styles -->
        @vite('resources/css/app.css')

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='800' preserveAspectRatio='none' viewBox='0 0 1440 800'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1006%26quot%3b)' fill='none'%3e%3crect width='1440' height='800' x='0' y='0' fill='%230e2a47'%3e%3c/rect%3e%3cpath d='M -120.94879598622833%2c697 C -24.95%2c581.2 167.05%2c150 359.05120401377167%2c118 C 551.05%2c86 647.05%2c505.2 839.0512040137717%2c537 C 1031.05%2c568.8 1127.05%2c275.8 1319.0512040137717%2c277 C 1511.05%2c278.2 1774.86%2c528 1799.0512040137717%2c543 C 1823.24%2c558 1511.81%2c390.2 1440%2c352' stroke='rgba(51%2c 121%2c 194%2c 0.58)' stroke-width='2'%3e%3c/path%3e%3cpath d='M -41.902359925989686%2c229 C 54.1%2c298 246.1%2c578.6 438.0976400740103%2c574 C 630.1%2c569.4 726.1%2c223.6 918.0976400740103%2c206 C 1110.1%2c188.4 1206.1%2c487.4 1398.0976400740103%2c486 C 1590.1%2c484.6 1869.72%2c162.8 1878.0976400740103%2c199 C 1886.48%2c235.2 1527.62%2c573.4 1440%2c667' stroke='rgba(51%2c 121%2c 194%2c 0.58)' stroke-width='2'%3e%3c/path%3e%3cpath d='M -13.901812485121923%2c226 C 82.1%2c265.6 274.1%2c410 466.0981875148781%2c424 C 658.1%2c438 754.1%2c268.2 946.0981875148781%2c296 C 1138.1%2c323.8 1234.1%2c603.6 1426.0981875148782%2c563 C 1618.1%2c522.4 1903.32%2c63.4 1906.0981875148782%2c93 C 1908.88%2c122.6 1533.22%2c587.4 1440%2c711' stroke='rgba(51%2c 121%2c 194%2c 0.58)' stroke-width='2'%3e%3c/path%3e%3cpath d='M -239.7051133289766%2c567 C -143.71%2c512.8 48.29%2c317.8 240.2948866710234%2c296 C 432.29%2c274.2 528.29%2c499.2 720.2948866710234%2c458 C 912.29%2c416.8 1008.29%2c43 1200.2948866710235%2c90 C 1392.29%2c137 1632.35%2c687.4 1680.2948866710235%2c693 C 1728.24%2c698.6 1488.06%2c233 1440%2c118' stroke='rgba(51%2c 121%2c 194%2c 0.58)' stroke-width='2'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1006'%3e%3crect width='1440' height='800' fill='white'%3e%3c/rect%3e%3c/mask%3e%3c/defs%3e%3c/svg%3e");   
            }
        </style>
    </head>
    <body class="  bg-slate-200 ">
        <div class="  container mx-auto mt-20  " >
          <form action="{{ route('logout') }}" method="POST">
            @csrf()
            <button  type="submit" class="bg-sky-500  active:bg-sky-600 font-bold uppercase text-base px-8 py-3 rounded shadow-md hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                logout
            </button>
           
        </form>
         
            <p class="text-2xl  font-bold text-gray-400"> Table Etudiants</p>
            <div class="flex   justify-end ">
            <a  href="{{ url('etudiants/create')}}" class="bg-sky-500  text-center  w-1/6 h-12 hover:bg-sky-900 text-white font-bold py-2 px-4 border border-sky-500 rounded">
                Ajouter Etudiant
              </a>
            </div>
         
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <form class="container mx-auto mt-5 flex items-center ">   
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Recherche par Nom Prenom Adresse" required>
                </div>
               
            </form>
              <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                 
                  <table class="min-w-full text-center   ">
                    <thead class="border-b bg-gray-800">
                      <tr>  
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4 ">
                          Nom
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                          Prenom
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                           Address
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                           Date de naissance 
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            idclasse 
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            ACTION 
                        </th>
                      </tr>
                    </thead class="border-b">
                    <tbody class="alldata">
 
                        @foreach ($etudiants  as $etudiant)
                        <tr class="bg-white border-b">
                            
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $etudiant->nom }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                               {{ $etudiant->prenom }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $etudiant->adresse }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $etudiant->dateNaissance }} 
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $etudiant->idclasse }} 
                            </td>
                            <td class="text-sm font-light px-6 py-4 flex whitespace-nowrap ">
                              <a href="/formations/classe/etudiantsInfo/{{ $etudiant->codeE }}" class="bg-green-500 mx-5 hover:bg-green-900 text-white font-bold py-2 px-4 border border-green-500 rounded">
                                Show info 
                              </a>
                                <a href="/etudiants/{{ $etudiant->codeE }}/edit" class="bg-green-500 mx-5 hover:bg-green-900 text-white font-bold py-2 px-4 border border-green-500 rounded">
                                    UPDATE
                                </a>
                              
                                <form  action="{{ url('/etudiants'.'/'.$etudiant->codeE) }}" method='POST'>
                                  <button   class="bg-red-500 hover:bg-red-900 text-white font-bold py-2 px-4 border border-red-500 rounded">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    DELET
                                  </button>
                                </form>

                            </td>
                          </tr class="bg-white border-b">
                        @endforeach
                    </tbody>
                    <tbody id="content"></tbody>
                  </table>
                 
              </div>
              </div>
            </div>
            <div class="flex justify-center mt-10">
           
            </nav>
          </div>
          
          </div>
          
          
        </div>
     
    </body>
</html>
<script>
  function myFunction() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
 </script>
 <script>
    $('#search').on('keyup',function(){
      $value=$(this).val();
      if($value){
        $('.alldata').hide()
        $('#content').show()
      }else{
        $('.alldata').show()
        $('#content').hide()
      }
      $.ajax({
        type:'get',
        url : '{{ URL::to("/search") }}',
        data :{'search':$value},
        success : function(data){
          $('#content').html(data);
        }
      })
    })
 </script>