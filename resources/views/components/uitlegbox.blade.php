<div class="bg-yellow-100 mx-28 text-2xl text-center my-14 py-10">
    <div>{{ $kort }}</div>
    <div>{{ $uitgebreid }}</div>
    @if ( isset($alert) )
        <div class="text-red-500">{{ $alert }}</div>
    @endif
</div>