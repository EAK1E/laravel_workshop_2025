<div class="navbar">
    <div class="flex items-center justify-between">
        <div>
            <i class="fa-solid fa-user me-2"></i>
            <span class="username">{{ $user_name }}</span>
        </div>
        <div>
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
</div>
