<form class="md:w-1/2 space-y-3" wire:submit.prevent='editarVacante'>
    <!-- Titulo Vacante -->
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input 
            id="titulo" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="titulo" 
            placeholder="Titulo de Vacante"
            :value="old('titulo')" 
        />
        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <!-- Salario -->
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select id="salario" 
            wire:model="salario"
            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option>-- Selecione --</option>
            @foreach ($salarios as $salario)
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </select>
        @error('salario')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <!-- Categoria -->
    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select id="categoria" wire:model="categoria"
        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
        <option>-- Selecione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>
        @error('categoria')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
     <!-- Titulo Vacante -->
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input 
            id="empresa" 
            class="block mt-1 w-full" 
            type="text" 
            wire:model="empresa" 
            placeholder="Nombre de Empresa"
            :value="old('empresa')" 
        />
        @error('empresa')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
     <!-- Fecha -->
    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />
        <x-text-input 
            id="ultimo_dia" 
            class="block mt-1 w-full" 
            type="date" 
            wire:model="ultimo_dia"
        />
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
     <!-- Descripción -->
    <div>
        <x-input-label for="descripcion" :value="__('Descripción del Puesto')" />
        <textarea
        id="descripcion" 
        wire:model="descripcion"
        placeholder="Descripción general del puesto"
        class="w-full h-48 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        >
        </textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <!-- Subir imagen -->
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input 
            id="imagen" 
            class="block mt-1 w-full" 
            type="file" 
            wire:model="imagen_nueva"
            accept="image/*"  
        />
        <div class="my-3 w-80">
            <x-input-label :value="__('Imagen Actual')" />
            <img src="{{asset('storage/vacantes/' . $imagen)}}" alt="{{'Imagen Vacante' . $titulo}}">
        </div> 
        <div class="my-3 w-80">
            @if ($imagen_nueva)
                Imagen Nueva:
                <img src="{{$imagen_nueva->temporaryUrl()}}">
            @endif
        </div> 

        @error('imagen_nueva')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>
    <!-- Botón-->
    <x-primary-button>
        Guardar Cambios
    </x-primary-button>
</form>

