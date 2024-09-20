<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            
        @forelse ( $vacantes as $vacante)
            <div class="p-6 text-gray-900 dark:text-gray-100 md:flex md:justify-between md:items-center">
                <div class="leading-4 mb-2">
                    <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-bold">
                        {{$vacante->titulo}}
                    </a>
                    <p class="text-sm text-gray-700 dark:text-gray-200 font-bold">{{$vacante->empresa}}</p>
                    <p class="text-sm text-gray-500">último día:{{$vacante->ultimo_dia->translatedFormat('D d/m/Y')}}</p>
                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-2">
                    <a href="{{route('candidatos.index', $vacante)}}"
                    class="bg-slate-800 dark:bg-slate-200 py-2 px-3 rounded-lg text-white dark:text-black text-xs font-bold text-center flex sm:flex-row justify-center items-center"
                    >{{$vacante->candidatos->count()}}
                     @choice('Candidato|Candidatos', $vacante->candidatos->count())
                    </a>

                    <a href="{{route('vacantes.edit',$vacante->id)}}"
                    class="bg-blue-800 dark:bg-blue-800 py-2 px-3 rounded-lg text-white text-xs font-bold text-center flex sm:flex-row justify-center items-center"
                    ><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                      </svg>
                      Editar
                    </a>

                    <button 
                    wire:click="$dispatch('eliminar', {{ $vacante->id }})"
                    class="bg-red-600 dark:bg-red-600 py-2 px-3 rounded-lg text-white text-xs font-bold text-center flex sm:flex-row justify-center items-center"
                    ><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                      </svg>
                    Eliminar
                    </button>
                </div>
            </div>
        
        @empty
            <p class="p-3 text-center text-sm text-gray-500">No hay vacantes que mostrar</p>
        @endforelse
    </div>

    <div class="sm:flex sm:justify-center mt-6">
        {{$vacantes->links() }}
    </div>
</div>

@push('scripts')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
       document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('eliminar', vacanteId => {
                Swal.fire({
                    title: '¿Quieres eliminar la vacante?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Aquí puedes despachar un evento Livewire para eliminar la vacante
                        Livewire.dispatch('eliminarVacante', {vacante: vacanteId});
                        Swal.fire(
                            '¡Vacante Eliminada!',
                            'Su vacante ha sido eliminada.',
                            'success'
                        )
                    }
                });
            });
        });
    </script>
@endpush