@props(['id', 'maxWidth', 'title', 'zIndex'])

@php
$id = $id ?? md5($attributes->wire('model'));
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
    ][$maxWidth ?? '2xl'];

    $zIndex = $zIndex ?? 999;
@endphp

<div
    x-data="{ show: @entangle($attributes->wire('model')) }"
    x-on:cloase.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    class="fixed inset-0 z-{{ $zIndex }} px-4 py-6 overflow-y-auto"
    style="display: none;"
>
    <div class="fixed inset-0 transform transition-all" x-on:click="show = false">
        <div class="absolute inset-0 bg-gray-200 opacity-30"></div>
    </div>
    <div class="mb-6 bg-blue-500 rounded-lg overflow-hidden shadow-xl transform tranistion-all sm:w=full {{ $maxWidth }} sm:mx-auto"
    x-show="show"
    x-trap.inset.noscroll="show"
    >
    <div class="px-3 py-3 bh-orange-500 text-white">
        <div class="text-lg font-medium">{{ $title }}</div>
    </div>

    <div class="px-3 py-3 text-grey-800">
        {{ $slot }}
    </div>
</div>
</div>