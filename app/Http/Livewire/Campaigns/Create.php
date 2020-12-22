<?php

namespace App\Http\Livewire\Campaigns;

use App\Models\Campaign;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $campaign;

    protected $rules = [
        'campaign.start_date_for_humans' => 'nullable|date_format:jS M Y h:iA',
    ];

    protected $validationAttributes = [
        'campaign.start_date_for_humans' => 'start date',
    ];

    public function mount()
    {
        $this->campaign = new Campaign();

        $this->campaign->start_date = Carbon::now()->startOfWeek()->setTime(0,0, 0);
    }

    public function create()
    {
        $this->validate();

        $this->campaign->save();
    }

    public function render()
    {
        return view('livewire.campaigns.create');
    }
}
