    {{-- test per il background da sistemare --}}
    <style>
        .section-custom {
            width: 100%;
            height: 100vh;
            background: linear-gradient(50deg,
                    white 0%,
                    white 50%,
                    paleturquoise 50%,
                    paleturquoise 100%);
            /* deve essere in base al tipo */

        }
    </style>



    <x-main>
        <section class="section-custom d-flex">
<img src="{{$pokemon->image_url}}" style="width: 350px; height: 350px" alt="">
        </section>
    </x-main>
