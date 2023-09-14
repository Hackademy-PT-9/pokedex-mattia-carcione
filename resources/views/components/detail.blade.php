<main class="section-custom vh-100 pb-2"
    style="width: 100%;height:100%; background: linear-gradient(30deg, white 0%, white 50%, {{ $color }} 50%, {{ $color }} 100%);">

    {{-- logo pokemon che rimanda all'index --}}
    <div class="position-md-absolute d-flex padding-sm">
        <div class="text-center pt-4">
            <a href="{{ route('index') }}"><img src="\pokemon-23.svg" class="poke-logo" alt=""></a>
        </div>
    </div>

    {{-- logo pokedex che rimanda all'index --}}
    <nav class="nav-bl z-1 d-none d-md-block">
        <a href="{{ route('index') }}">
            <img src="/pokedex-icon-10.jpg" class="pokedex-nav" style="font-size: 45px"></img>
        </a>
    </nav>

    {{-- section con il dettaglio --}}
    <section
        class="container d-flex flex-wrap flex-md-nowrap align-items-center justify-content-evenly mt-5 flex-wrap-reverse margin-sm">
        <div class="row w-50 h-50 justify-content-center div-sm">
            <div class="col-md-12">
                <h1 class="text-center align-items-center mb-5">
                    <span id="pokemon-name">{{ $pokemon->name }}
                    </span>
                </h1>
            </div>
            <div class="col-4 h-25">
                <div>
                    <h5>Hp</h5>
                    <p class="fs-5">
                    <span id="span-stat">
                            {{ $pokemon->stats[0]['base_stat'] }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="col-4 h-25">
                <div>
                    <h5>Atk</h5>
                    <p class="fs-5">
                        <span id="span-stat">
                            {{ $pokemon->stats[1]['base_stat'] }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="col-4 h-25">
                <div>
                    <h5>Def</h5>
                    <p class="fs-5">
                        <span id="span-stat">
                            {{ $pokemon->stats[2]['base_stat'] }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="col-4 h-25">
                <div>
                    <h5>Sp.Atk</h5>
                    <p class="fs-5">
                        <span id="span-stat">
                            {{ $pokemon->stats[3]['base_stat'] }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="col-4 h-25">
                <div>
                    <h5>Sp.Def</h5>
                    <p class="fs-5">
                        <span id="span-stat">
                            {{ $pokemon->stats[4]['base_stat'] }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="col-4 h-25">
                <div>
                    <h5>Spe</h5>
                    <p class="fs-5">
                        <span id="span-stat">
                            {{ $pokemon->stats[5]['base_stat'] }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="col-12 mt-5 box-description" style="border-color:{{ $color }}">
                <h5 class="mt-2 mb-3 text-start">Pokedex Description:</h5>
                <p class="m-1 text-start">{{ $pokemon->pokedex_description }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <img src="{{ $pokemon->image_url }}" style="width: 350px; height: 350px" alt="">
            </div>
        </div>
    </section>
</main>
