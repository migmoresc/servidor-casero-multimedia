@switch($tipo)
    @case('Peliculas')
        @include('generos.peliculas')
    @break

    @case('Series')
        @include('generos.series')
    @break

    @case('Libros')
        @include('generos.libros')
    @break

    @case('Revistas')
        @include('generos.revistas')
    @break

    @case('Animes')
        @include('generos.animes')
    @break

    @case('Musica')
        @include('generos.musica')
    @break

    @case('Videos')
        @include('generos.videos')
    @break

    @case('Documentales')
        @include('generos.documentales')
    @break

    @default
@endswitch
