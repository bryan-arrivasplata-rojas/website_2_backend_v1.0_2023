<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Http;

class UsabilitiesTable extends Component
{
    public $loading = true;
    public $response = [];
    
    public function mount(){
        $this->fetchData();
    }

    public function fetchData(){
        $http = new Http();
        $this->response = $http->get('usability');

        // Si hay datos en la respuesta, indicamos que ya no está cargando.
        if (!empty($this->response)) {
            $this->loading = false;
        }
    }
    
    public function render()
    {
        return view('livewire.usabilities-table');
    }

    // Método para recibir el evento de eliminación
    public function usabilityDeleted($message)
    {
        session()->flash('success', $message);
        $this->fetchData(); // Actualizar datos después de la eliminación
    }
}
