<div>
    <div class="content-header">ผู้เข้าพัก</div>
    <div class="content-body">
        <button class="btn-info" wire:click="openModal">
            <i class="fa-solid fa-plus mr-2"></i>
            เพิ่มข้อมูล
        </button>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th class="text-left">Name</th>
                    <th class="text-left">Phone</th>
                    <th class="text-right">Room No.</th>
                    <th class="text-left">Date IN</th>
                    <th class="text-left">Visit Type</th>
                    <th class="text-left">Note.</th>
                    <th width="240px"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td class="text-right">{{ $customer->room->name }}</td>
                        <td>{{ date('d/m/Y', strtotime($customer->created_at)) }}</td>
                        <td>{{ $customer->stay_type == 'd' ? 'รายวัน' : 'รายเดือน' }}</td>
                        <td>{{ $customer->remark }}</td>
                        <td class="text-center">
<<<<<<< HEAD
                            <button class="btn-warning" wire:click="openModalMove({{ $customer->id }})">
                                <i class="fa-solid fa-person-shelter"></i>

                            </button>
=======
>>>>>>> fffa9d9b03335c23374c1b936d42c2977d08ecaa
                            <button class="btn-success" wire:click="openModalEdit({{ $customer->id }})">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                            <button class="btn-danger" wire:click="openModalDelete({{ $customer->id }})">
                                <i class="fa-solid fa-times"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


<x-modal wire:model="showModal" title="ผู้เข้าพัก">
        <div class="w-1/2">
            <div>ชื่อ</div>
            <input type="text" wire:model="name" class="form-control"/>
        </div>
        <div class="w-1/2">
            <div>เบอร์โทร</div>
            <input type="text" wire:model="phone" class="form-control"/>
        </div>
        <div class="flex gap-2 mt-3">
            <div class="w-full md:w-1/3">
                <div>ห้องพัก</div>
                <select wire:model="roomId" class="form-control">
                    <option value="">เลือกห้องพัก</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full md:w-1/3">
                <div>วันที่เข้าพัก</div>
                <input type="date" wire:model="createdAt" class="form-control" />
            </div>
            <div class="w-full md:w-1/3">
                <div>ประเภทการเข้าพัก</div>
                <select wire:model="stayType" class="form-control">
                    <option value="d">รายวัน</option>
                    <option value="m">รายเดือน</option>
                </select>
            </div>
        </div>

        <div class="mt-3">ที่อยู่</div>
        <input type="text" wire:model="address" class="form-control"/>
        
        <div class="mt-3">หมายเหตุ</div>
        <input type="text" wire:model="remark" class="form-control" />

        <div class="flex gap-2 mt-3 justify-center">
            <button class="btn-success" wire:click="save">
                <i class="fa-solid fa-check mr-2"></i>
                บันทึก
            </button>
            <button class="btn-secondary" wire:click="closeModal">
                <i class="fa-solid fa-times"></i>
                ยกเลิก
            </button>
<<<<<<< HEAD
        </div>
</x-modal>

<x-modal wire:model="showModalMove" title="ย้ายห้องพัก">
    <div>ห้องใหม่</div>
    <select class="form-control" wire:model="roomIdMove">
        <option value="">เลือกห้องพัก</option>
        @foreach ($rooms as $room)
            <option value="{{ $room->id}}">
                {{ $room->name }}
            </option>
        @endforeach
    </select>
    <div class="mt-3 text-center">
        <button class="btn btn-success" wire:click="move">
            <i class="fa-solid fa-check mr-2"></i>
            บันทึก
        </button>
        <button class="btn btn-secondary" wire:click="closeModalMove">
            <i class="fa-solid fa-times mr-2"></i>
            ยกเลิก
        </button>
    </div>
    <div class="mt-3 text-center">

    </div>
</x-modal>

<x-modal-confirm showModalDelete="showModalDelete" title="ลบผู้เข้าพัก" text="คุณต้องการลบผู้เข้าพักใช่หรือไม่"
=======
        </div>x
</x-modal>

<x-modal-confirm wire:model="showModalDelete" title="ลบผู้เข้าพัก" text="คุณต้องการลบผู้เข้าพักใช่หรือไม่"
>>>>>>> fffa9d9b03335c23374c1b936d42c2977d08ecaa
    clickConfirm="delete" clickCancel="closeModalDelete">
</x-modal-confirm>
</div>
