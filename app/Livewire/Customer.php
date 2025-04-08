<?php 
namespace App\livewire;

use Livewire\Component;
use App\Models\CustomerModel;
use App\Models\RoomModel;

class Customer extends Component {
    public $customer = [];
    public $rooms = [];
    public $showModal = false;
    public $showModalDelete = false;
    public $id;
    public $name;
    public $address;
    public $phone;
    public $remark;
    public $roomId;
    public $createAt;
    public $stayType; //รายวัน (d), รายเดือน (m)

    public function render() {
        return view('customer');
    }
    public function fetchData() {

    }
}
?>