<?php

namespace App\Livewire\Page;

use Carbon\Carbon;
use App\Models\Page;
use App\Models\Edisi;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public Edisi $edisi;
    public $title;
    public $date;
    public $document;
    public $audio_ind;
    public $audio_eng;

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'date' => 'required|date',
            'document' => 'required|image'
        ]);

        $path = $this->document->store('page', 'public');
        $path_audio_ind = $this->audio_ind ? $this->audio_ind->store('audio', 'public') : null;
        $path_audio_eng = $this->audio_eng ? $this->audio_eng->store('audio', 'public') : null;
        
        Page::create([
            'edisi_id' => $this->edisi->id,
            'title' => $this->title,
            'date' => Carbon::parse($this->date)->translatedFormat('j F Y'),
            'file' => $path,
            'audio_ind' => $path_audio_ind,
            'audio_eng' => $path_audio_eng
        ]);

        return redirect()->route('edisi', ['edisi' => $this->edisi]);
    }
    
    public function render()
    {
        return view('livewire.page.create', [
            'edisi' => $this->edisi
        ]);
    }
}