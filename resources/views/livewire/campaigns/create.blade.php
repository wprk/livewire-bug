<form wire:submit.prevent="create">
    <x-input.datetime wire:model="campaign.start_date_for_humans" id="start_date_for_humans" />
    <button type="submit">Submit</button>
</form>
