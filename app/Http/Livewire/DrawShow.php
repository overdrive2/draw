<?php

namespace App\Http\Livewire;

use App\Models\Member;
use Livewire\Component;
use App\Http\Livewire\DataTable\WithPerPagePagination;
use App\Models\WinnerLog;

class DrawShow extends Component
{
    use WithPerPagePagination;
    public $type;

    public function getRowsProperty()
    {
        $winners = WinnerLog::where('winnertype_id', $this->type)->pluck('member_id');
        return $this->applyPagination(Member::whereIn('id', $winners));
    }

    public function random($max, $type)
    {
        $this->type = $type;
        while(WinnerLog::where('winnertype_id', $type)->count() < $max) {
            $winners = WinnerLog::pluck('member_id');
            $members = Member::whereNotIn('id', $winners)->pluck('id')->toArray();
            $draw = array_rand($members);
            $winner = WinnerLog::where('member_id', $draw)->first();

            if(!$winner)
                WinnerLog::make(['member_id' => $draw, 'winnertype_id' => $type])->save();
            
            sleep(0.750);
        }
    }

    public function mount()
    {
        $this->perPage = 25;
        $this->type = 1;
    }

    public function render()
    {
        return view('livewire.draw-show', [
            'rows' => $this->rows, 
            'win1' => WinnerLog::where('winnertype_id', 1)->count(), 
            'win2' => WinnerLog::where('winnertype_id', 2)->count()
        ]);
    }
}
