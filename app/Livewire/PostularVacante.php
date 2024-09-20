<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class PostularVacante extends Component
{

    use WithFileUploads;
    public $cv;
    public $vacante;

    protected $rules =[
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        // Validar que el usuario no sea el reclutador
        if(auth::user()->id == $this->vacante->reclutador->id) {
            session()->flash('error', 'No puedes postularte a una vacante que tu mismo publicaste');
        }else if($this->vacante->candidatos()->where('user_id', auth::user()->id)->count() > 0) {
            // validar que el usuario no haya postulado a la vacante
            session()->flash('error', 'Ya postulaste a esta vacante anteriormente');
        } else {
            //Almacenar el CV
            $cv = $this->cv->store('public/cv');
            $datos['cv'] = str_replace('public/cv/','',$cv);

            //Crear el candidato
            $this->vacante->candidatos()->create([
                'user_id' => auth::user()->id,
                'cv' => $datos['cv'],
            ]);

            //Crear Notoficación y enviar email
            $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth::user()->id,));

            //Mostrar al usuario msj de OK
            session()->flash('mensaje','Tu información se envió correctamente, mucha suerte');
            
            return redirect()->back();

        }
    }
    
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
