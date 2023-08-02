<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Http;

class FilesTable extends Component
{
    public $loading = true;
    public $response = [];
    public $selectedUsability = null;
    public $selectedType = null;

    public function mount(){
        $this->fetchData();
    }

    public function fetchData(){
        $http = new Http();
        // Aquí filtramos los datos en función de los valores seleccionados en el select
        $filters = [
            'usability' => $this->selectedUsability ?? -1,
            'type' => $this->selectedType ?? -1,
        ];
        
        $this->response = $http->get('file/search/'.$filters['usability'].'&'.$filters['type']);
       
        // Si hay datos en la respuesta, indicamos que ya no está cargando.
        if (!empty($this->response)) {
            $this->loading = false;
        }
    }
    public function filterByUsability($usabilityId)
    {
        $this->selectedUsability = $usabilityId;
        $this->fetchData(); // Llamar al método fetchData() para obtener los datos filtrados
        $this->emit('tableUpdated'); // Emitir el evento 'tableUpdated'
    }

    public function filterByType($typeId)
    {
        $this->selectedType = $typeId;
        $this->fetchData(); // Llamar al método fetchData() para obtener los datos filtrados
        $this->emit('tableUpdated'); // Emitir el evento 'tableUpdated'
    }
    
    public function render()
    {
        // Obtener los datos necesarios para los selects
        $http = new Http();
        $types = $http -> get('type');
        $usabilities = $http -> get('usability');

        // Pasar los datos a la vista
        return view('livewire.files-table', [
            'usabilities' => $usabilities,
            'types' => $types,
        ]);
    }
}
