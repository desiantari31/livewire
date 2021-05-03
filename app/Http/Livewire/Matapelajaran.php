<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mapel;

class Matapelajaran extends Component
{
    public $mapels, $hari, $mata_pelajaran, $jam,   $nama_pengajar, $kelas, $mapel_id;
    public $isModalOpen = 0;

    public function render()
    {
        $this->mapels = Mapel::all();
        return view('livewire.mapel');
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->hari = '';
        $this->mata_pelajaran = '';
        $this->jam = '';
        $this->nama_pengajar= '';
        $this->kelas= '';


    }
    
    public function store()
    {
        $this->validate([
            'hari' => 'required',
            'mata_pelajaran' => 'required',
            'jam' => 'required',
            'nama_pengajar' => 'required',
            'kelas' => 'required',

        ]);
    
        Mapel::updateOrCreate(['id' => $this->mapel_id], [
            'hari' => $this->hari,
            'mata_pelajaran' => $this->mata_pelajaran,
            'jam' => $this->jam,
            'nama_pengajar' => $this->nama_pengajar,
            'kelas' => $this->kelas,
        ]);

        session()->flash('message', $this->mapel_id ? 'mapel updated.' : 'mapel created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        $this->id = $id;
        $this->hari = $mapel->hari;
        $this->mata_pelajaran = $mapel->mata_pelajaran;
        $this->jam = $mapel->jam;
        $this->nama_pengajar = $mapel->nama_pengajar;
        $this->kelas = $mapel->kelas;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Mapel::find($id)->delete();
        session()->flash('message', 'Studen deleted.');
    }
}

