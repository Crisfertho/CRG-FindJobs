<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;

class MostrarVacantes extends Component
{
    
    #[On('eliminarVacante')]
    public function eliminarVacante(Vacante $vacante)
    {
        // Compruebo Policy
        $this->authorize('delete', $vacante);
        // Elimino Imagen
        $result = Storage::delete('public/vacantes/'.$vacante->imagen);
        // Elimino Vacante
        $vacante->delete();

        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id', auth::user()->id)->paginate(5);
        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
