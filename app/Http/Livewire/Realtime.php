<?php

namespace App\Http\Livewire;

use App\Models\sensor;
use Livewire\Component;

class Realtime extends Component
{
    public $humidity = 0;
    public $temperature = 0;

    public function setvalue(){
        if($this->humidity >100){
            $this->humidity = 0;
        }
        if($this->temperature > 100){
            $this->temperature = 0;
        }
        $this->humidity = $this->humidity + 2;
        $this->temperature = $this->temperature + 5;
    }
    public function render()
    {
        $sensors = sensor::all();
        return view('livewire.realtime',compact('sensors'));
    }
}
