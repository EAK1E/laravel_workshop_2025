
<div class="sidebar">
    <div class="sidebar-header">
        <div class="text-center">System 1.0</div>
    </div>
    <div class="sidebar-body">
        <div class="menu">
            <ul>
                <li wire:click="changeMenu('dashboard')" @if ($currentMenu == 'dashboard') class="active" @endif>
                    <a href="/dashboard" wire:navigate>
                        <i class="fa-solid fa-house me-2"></i>Dashboard</li>
                    </a>
                <li wire:click="changeMenu('billing')" @if ($currentMenu == 'billing') class="active" @endif><i class="fa-solid fa-file-invoice-dollar me-2"></i>ใบเสร็จรับเงิน</li>
                <li wire:click="changeMenu('pay')" @if ($currentMenu == 'pay') class="active" @endif><i class="fa-solid fa-note-sticky me-2"></i>บันทึกค่าใช้จ่าย</li>
                <li wire:click="changeMenu('room')" @if($currentMenu =='room') class="active" @endif><i class="fa-solid fa-home me-2"></i>ห้องพัก</li>
                <li wire:click="changeMenu('customer')" @if($currentMenu == 'customer') class="active" @endif><i class="fa-solid fa-user me-2"></i>ผู้เข้าพัก</li>
                <li wire:click="changeMenu('user')" @if($currentMenu == 'user') class="active" @endif><i class="fa-solid fa-gear me-2"></i>ระบบผู้ใช้งาน</li>

                <li>
                    <a href="/company/index" wire:navigate>
                    <i class="fa-solid fa-building me-2"></i>ข้อมูลสถานที่</li>
                    </a>
            </ul>
        </div>
    </div>
</div>