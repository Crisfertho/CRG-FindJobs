<div class="bg-gray-100 dark:bg-gray-700 p-4 mt-7 flex flex-col justify-center items-center ">
    <h3 class="text-center text-2xl font-bold my-3 ">Postularme a esta Vacante</h3>

    @if (session()->has('mensaje'))
        <p class=" rounded-lg border border-green-600 bg-green-100 text-green-700 font-bold p-2 my-3 text-sm">
            {{session('mensaje')}}
        </p>

    @else {{--Para que el formulario desaparezca cuando se envie correctamente--}}

        <form wire:submit.prevent='postularme' class="w-80 mt-3 flex flex-col items-center">
            <div class="mb-4 text-center">
                <x-input-label for="cv" :value="__('Currículum o Hoja de Vida (PDF)')" />
                <x-text-input id="cv" type="file" wire:model="cv" accept=".pdf" class="block mt-2 w-full" />
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message" />
            @enderror

            <x-primary-button class="my-4">
                {{__('Postularme')}}
            </x-primary-button>
        </form>

    @endif
</div>
