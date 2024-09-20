<div class="p-4">
    {{-- comentarios --}}
    <div class="mb-5">
        <h3 class="font-bold text-2xl text-gray-800 dark:text-gray-400 ">
            {{$vacante->titulo}}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-100 dark:bg-gray-700 border border-dashed border-cyan-950 dark:border-white  p-3 my-2">
            <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200 my-2">Empresa:
                <span class="normal-case font-normal">{{$vacante->empresa}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200 my-2">Último día de postulación:
                <span class="normal-case font-normal">{{$vacante->ultimo_dia->format('d/m/Y')}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200 my-2">Categoría:
                <span class="normal-case font-normal">{{$vacante->categoria->categoria}}</span>
            </p>

            <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200 my-2">Salario:
                <span class="normal-case font-normal">{{$vacante->salario->salario}}</span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-5 gap-2">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacantes/' . $vacante->imagen)}}" 
                 alt="{{'Imagen vacante' . $vacante->titulo}}">
        </div>
        
        <div class="md:col-span-3 text-center">
            <h2 class="text-2xl font-bold my-3">Descripción de la Vacante</h2>
            <p>{{$vacante->descripcion}}</p>
        </div>

    </div>


    @guest  {{-- Para que aparezca solo cuando NO este autenticado --}}
        <div class="mt-4 bg-gray-100 dark:bg-gray-700 border border-dashed border-cyan-950 dark:border-white p-4 text-center ">
            <p>¿Deseas aplicar a esta vacante?
                <a class="font-bold text-indigo-600" href="{{route('register')}}">Obten una cuenta para aplicar.</a>
            </p>
        </div>
    @endguest

    @auth
    @cannot('create', App\Model\Vacante::class)   
        <livewire:postular-vacante :vacante="$vacante" />
    @endcannot
    @endauth
</div>
