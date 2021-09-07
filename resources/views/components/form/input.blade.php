
@props(['veldnaam'])

<x-form-field>
    <x-form.label veldnaam="{{ $veldnaam }}" />

    <input class="border border-gray-200 p-2 w-full rounded"
           veldnaam="{{ $veldnaam }}"
           id="{{ $veldnaam }}"
           {{ $attributes(["value" => old($veldnaam)]) }}
    >

    <x-form.error veldnaam="{{ $veldnaam }}" />
</x-form-field>

<!--

@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <input class="border border-gray-200 p-2 w-full rounded"
           name="{{ $name }}"
           id="{{ $name }}"
           {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>

-->