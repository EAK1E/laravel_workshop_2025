<div class="navbar">
    <div class="flex items-center justify-between ">
        <div class="bg-blue-100 p-3 rounded-full mr-3">
            <i class="fas fa-user text-blue-600"></i>
            <span class="username text-lg font-medium text-gray-800">{{ $user_name }}</span>
        </div>
        <div>
            <button wire:click="editProfile" class="border border-blue-400 text-blue-400 hover:text-white px-6 py-3 rounded-2xl mr-2">
                <i class="fa-solid fa-user me-2"></i>
                แก้ไขข้อมูล
            </button>
            <button wire:click="showModal = true" 
            class="border border-blue-500 text-white px-6 py-3 rounded-2xl">
                <span>ออกจากระบบ</span>
                <i class="fa-solid fa-sign-out-alt"></i>
            </button>
        </div>
    </div>



    <x-modal wire:model="showModal" maxWidth="sm" title="ออกจากระบบ">
        <div class="text-center">
            <div><i class="fa-solid fa-question text-red-500 text-5xl"></i></div>
            <div class="text-3xl font-bold text-grey-800 mt-3">ออกจากระบบ</div>
            <div class="text-grey-800 mt-3 text-2xl">คุณต้องการออกจากระบบ กรุณากดยืนยัน</div>
        </div>

        <div class="flex justify-center mt-6 pb-4">
            <button class="btn-danger mr-3" wire:click="logout">
                    <i class="fa-solid fa-check me-2"></i>
                    ยืนยัน
            </button>
                <button class="btn-secondary" wire:click="showModal = false">
                    <i class="fa-solid fa-xmark me-2"></i>
                    ยกเลิก
                </button>
        </div>
    </x-modal>

    <x-modal wire:model="showModalEdit" maxWidth="sm" title="แก้ไขข้อมูลส่วนตัว">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div>Username</div>
        <input type="text" wire:model="username" class="form-control" placeholder="Username" />

        <div class="mt-3">Password ใหม่</div>
        <input type="text" wire:model="password" class="form-control" />

        <div class="mt-3">ยืนยัน Password ใหม่</div>
        <input type="text" wire:model="password_confirm" class="form-control" />

        <div class="mt-5 text-center pb-5">
            <button class="btn-success mr-2" wire:click="updateProfile">
                <i class="fa-solid fa-check mr-2"></i>
                ยืนยัน
            </button>
            <button class="btn-secondary mr-2" wire:click="showModalEdit = false ">
                <i class="fa-solid fa-xmmark me-1"></i>
                ยืนยัน
            </button>
        </div>
        @if($saveSuccess)
            <div class="alert alert-success">
                <i class="fa-solid fa-check mr-2"></i>
                บันทึกข้อมูลสำเร็จ
            </div>
        @endif

    </x-modal>
</div>


