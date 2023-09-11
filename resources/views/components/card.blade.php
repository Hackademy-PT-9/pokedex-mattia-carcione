<div class="container">
    <div class="row justify-content-start">
        @foreach ($pokemonData as $pokemon)
            {{-- il bg dovrà essere in base al tipo --}}
            <div class="card col-md-3 mx-1 mb-3 trans-scale {{ $pokemon->type }}" style="width: 15rem; height: 22rem;">
                <a href="{{ route('show', ['pokemon' => $pokemon]) }}">
                    <div class="text-center py-3">
                        <img src="{{ $pokemon->image_url }}" class="card-img-top" alt="{{ $pokemon->name }}">
                    </div>

                    <div class="card-body text-center text-dark border-top">
                        <h5 class="card-title pb-2">{{ $pokemon->name }}</h5>
                        <span class="rounded-pill p-1 opacity-75 span-card">#{{ $pokemon->pokedex_number }}</span>
                        <p class="card-text pt-3 text-container">
                            {{ $pokemon->pokedex_description }}
                        </p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
