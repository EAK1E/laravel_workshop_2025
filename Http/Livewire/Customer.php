<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Room;

class Customer extends Component
{
    public $name;
    public $phone;
    public $roomId;
    public $createdAt;
    public $stayType;
    public $address;
    public $remark;
    public $showModal = false;
    public $showModalDelete = false;

    public $roomIdMove;
    public $customerIdToMove;
    public $showModalMove = false;

    public function render()
    {
        return view('livewire.customer', [
            'customers' => Customer::with('room')->get(),
            'rooms' => Room::all(),
        ]);
    }

    public function openModal()
    {
        $this->resetInputFields();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'roomId' => 'required',
            'createdAt' => 'required',
            'stayType' => 'required',
        ]);

        Customer::updateOrCreate(
            ['id' => $this->customerId],
            [
                'name' => $this->name,
                'phone' => $this->phone,
                'room_id' => $this->roomId,
                'created_at' => $this->createdAt,
                'stay_type' => $this->stayType,
                'address' => $this->address,
                'remark' => $this->remark,
            ]
        );

        session()->flash('message', 'Customer saved successfully.');

        $this->closeModal();
    }

    public function openModalDelete($id)
    {
        $this->customerId = $id;
        $this->showModalDelete = true;
    }

    public function closeModalDelete()
    {
        $this->showModalDelete = false;
    }

    public function delete()
    {
        Customer::find($this->customerId)->delete();
        session()->flash('message', 'Customer deleted successfully.');
        $this->closeModalDelete();
    }

    public function openModalMove($customerId)
    {
        $this->customerIdToMove = $customerId;
        $this->roomIdMove = null; // Reset the selected room
        $this->showModalMove = true;
    }

    public function closeModalMove()
    {
        $this->showModalMove = false;
    }

    public function moveRoom()
    {
        $customer = Customer::find($this->customerIdToMove);
        if ($customer && $this->roomIdMove) {
            $customer->room_id = $this->roomIdMove;
            $customer->save();
            $this->closeModalMove();
            session()->flash('message', 'Room moved successfully.');
        } else {
            session()->flash('error', 'Please select a valid room.');
        }
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->phone = '';
        $this->roomId = '';
        $this->createdAt = '';
        $this->stayType = '';
        $this->address = '';
        $this->remark = '';
    }
}