
@props(['veldnaam'])

<label class="block mb-2 uppercase font-bold text-xs text-gray-700"
       for="{{ $veldnaam }}">
    {{ ucwords( $veldnaam )}}
</label>

<!--
@props(['name'])

<label class="block mb-2 uppercase font-bold text-xs text-gray-700"
       for="{{ $name }}"
>
    {{ ucwords($name) }}
</label>
-->