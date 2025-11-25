<?php

namespace App\Livewire\Edisi;

use Carbon\Carbon;
use App\Models\Edisi;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $cover;
    public $number;
    public $date_start;
    public $date_end;

    public function save()
    {
        $this->validate([
            'cover'      => 'required|image',
            'number'     => 'required',
            'date_start' => 'required|date',
            'date_end'   => 'required|date'
        ]);

        $path = $this->cover->store('edisi', 'public');
        
        Edisi::create([
            'number' => $this->number,
            'date' => Carbon::parse($this->date_start)->translatedFormat('j F Y') . ' - ' . Carbon::parse($this->date_end)->translatedFormat('j F Y'),
            'cover' => $path
        ]);

        return redirect()->route('index');
    }

    public function render()
    {
        return view('livewire.edisi.create');
    }
}
