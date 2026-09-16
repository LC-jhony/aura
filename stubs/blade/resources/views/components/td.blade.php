@props(['align' => 'left'])
@php
    $textAlignClass =
        [
            'left' => 'text-left',
            'right' => 'text-right',
            'center' => 'text-center',
        ][$align] ?? 'text-left';
@endphp
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white {{ $textAlignClass }}">
    {{ $slot }}
</td>
