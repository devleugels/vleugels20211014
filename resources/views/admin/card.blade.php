<div class="card">
    <div class="cardheader">
        <i class="float-left fa {{ $icon }}"></i>
        {{ $header }}
        <div class="float-right">
            <getal-cirkel aantal="{{ $aantal }}">{{ $aantal }}</getal-cirkel>
        </div>
    </div>
    <div class="cardbody">
        <div class="cardtekst">
            {{ $text }}
        </div>
        <div class="cardknop">
            <a href="{{ $href }}" class="cardknop">{{ $button }}</a>
        </div>
    </div>
</div>


