<?php 
namespace App\Livewire;

use App\Models\BillingModel;
use Livewire\Component;

class Dashboard extends Component {
    public $income = 0;
    public $roomFee = 0;
    public $debt = 0;
    public $pay = 0;

    public function mount(){
        $incomes = BillingModel::where('status', 'paid')
        ->get();

        foreach ($incomes as $income) {
            $this->income += $income->sumAmount() + $income->money_added;
        }
    }

    public function render() {
        return view('livewire.dashboard');
    }
}

?>