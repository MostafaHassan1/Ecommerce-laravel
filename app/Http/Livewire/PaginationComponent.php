<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

/**
 * This class whole porpuose is to override the setPage function in the livewire pagination 
 * The override dispatch an event to tell that the dom content loaded
 */
class PaginationComponent extends Component
{
    use WithPagination;

    public function setPage($page)
    {
        $this->page = $page;
        $this->dispatchBrowserEvent('PaginationLoaded');
    }
}
