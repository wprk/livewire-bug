<?php

namespace Tests\Feature\Campaigns;

use App\Models\Campaign;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_a_campaign()
    {
        $newCampaign = Campaign::factory()->make();

        Livewire::test('campaigns.create')
            ->set('campaign.start_date_for_humans', $newCampaign->start_date_for_humans)
            ->call('create');

        $campaign = Campaign::latest()->first();

        $this->assertEquals($newCampaign->start_date_for_humans, $campaign->start_date_for_humans);
    }
}
