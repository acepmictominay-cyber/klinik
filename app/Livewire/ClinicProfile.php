<?php

namespace App\Livewire;

use App\Models\ClinicProfile as ClinicProfileModel;
use Livewire\Component;

class ClinicProfile extends Component
{
    public bool $isEdit = false;
    public $name;
    public $address;
    public $phone;
    public $email;
    public $description;
    public $image;
    public $operating_hours = [];
    public $selected_days = [];

    public function mount()
    {
        $profile = ClinicProfileModel::first();
        if ($profile) {
            $this->name = $profile->name;
            $this->address = $profile->address;
            $this->phone = $profile->phone;
            $this->email = $profile->email;
            $this->description = $profile->description;
            $this->image = $profile->image;
            $this->operating_hours = $profile->operating_hours ?? [];
            $this->selected_days = array_keys($this->operating_hours);
        }
    }

    public function updatedSelectedDays()
    {
        // Remove hours for unselected days
        $this->operating_hours = array_intersect_key($this->operating_hours, array_flip($this->selected_days));
        // Add empty hours for newly selected days
        foreach ($this->selected_days as $day) {
            if (!isset($this->operating_hours[$day])) {
                $this->operating_hours[$day] = ['start' => '08:00', 'end' => '17:00'];
            }
        }
    }

    public function save()
    {
        $profile = ClinicProfileModel::first();
        if ($profile) {
            $profile->update([
                'name' => $this->name,
                'address' => $this->address,
                'phone' => $this->phone,
                'email' => $this->email,
                'description' => $this->description,
                'image' => $this->image,
                'operating_hours' => $this->operating_hours,
            ]);
            session()->flash('message', 'Profile updated successfully.');
        }
    }

    public function render()
    {
        $profile = ClinicProfileModel::first();
        return view('livewire.clinic-profile', compact('profile'));
    }
}
