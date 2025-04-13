
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
                <li wire:click="changeMenu('pay')" @if ($currentMenu == 'pay') class="active" @endif><i class="fa-solid fa-building me-2"></i>บันทึกค่าใช้จ่าย</li>
                <li class="btn-info" wire:click="changeMenu('room')" @if($currentMenu =='room') class="active" @endif><i class="fa-solid fa-home me-2"></i>ห้องพัก</li>
                <li wire:click="changeMenu('customer')" @if($currentMenu == 'customer') class="active" @endif><i class="fa-solid fa-user me-2"></i>Customer</li>
                <li wire:click="changeMenu('user/index')" @if($currentMenu == 'user/index') class="active" @endif><i class="fa-solid fa-gear me-2"></i>เมนูที่ 4</li>

                <li>
                    <a href="/company/index" wire:navigate>
                    <i class="fa-solid fa-building me-2"></i>เมนูที่ 5</li>
                    </a>
            </ul>
        </div>
    </div>
</div>