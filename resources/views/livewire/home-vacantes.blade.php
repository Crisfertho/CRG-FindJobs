<div>
    <livewire:filtrar-vacantes />

    <div class="py-8 px-6">
        <div class="max-w-6xl mx-auto">
            <h3 class="font-extrabold text-3xl text-gray-700 dark:text-gray-300 mb-8">Nuestras Vacantes Disponibles</h3>

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 divide-y divide-gray-300">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a class="text-2xl font-extrabold text-gray-600 dark:text-gray-200"
                               href="{{route('vacantes.show', $vacante->id)}}">
                                {{$vacante->titulo}}
                            </a>
                            <p class="text-base text-gray-600 dark:text-gray-400 mb-1">{{$vacante->empresa}}</p>
                            <p class="text-xs font-bold text-gray-600 dark:text-gray-200 mb-1">{{$vacante->categoria->categoria}}</p>
                            <p class="text-base text-gray-600 dark:text-gray-300 mb-1">{{$vacante->salario->salario}}</p>
                            <p class="font-bold text-xs text-gray-600 dark:text-gray-200">
                                Último día para portularse: <span>{{$vacante->ultimo_dia->format('d/m/Y')}}</span>
                            </p>
                        </div>
                        <div class="mt-3 md:mt-0">
                            <a class="dark:bg-gray-200 bg-gray-800 text-white dark:text-black uppercase text-sm font-bold p-2 rounded-lg text-center flex sm:flex-row justify-center items-center" 
                               href="{{route('vacantes.show', $vacante->id)}}">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                              </svg>
                              
                                Ver Vacante
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600 dark:text-gray-300">No hay vacantes aún.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
