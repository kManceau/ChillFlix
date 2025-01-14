@extends('layouts.app')

@section('content')
    <section id="new-movies-container" class="container-fluid">
        <h2>Dernières sorties films :</h2>
        <div class="cards-container">
            @foreach($lastMovies as $movie)
                <div class="cards">
                    <h3 class="h5 cards-title">{{$movie['title']}}</h3>
                    <img src="https://image.tmdb.org/t/p/original/{{$movie['poster_path']}}" alt="Affiche de {{ $movie['title'] }}" class="cards-img">
                </div>
            @endforeach
        </div>
    </section>
    <section id="popular-movies-container" class="container-fluid">
        <h2>Films Populaires :</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium ad aliquam amet, animi debitis dignissimos ducimus excepturi, explicabo ipsa nam nisi odit officia omnis porro quis ratione vitae? Ad adipisci animi aperiam consequuntur corporis dicta dignissimos ea error fugit in iste natus nisi nulla optio quis, saepe sequi, veniam! Commodi consequuntur corporis culpa cupiditate deserunt dicta dolor dolore dolores error expedita facere incidunt, inventore ipsum itaque magnam magni molestiae nesciunt odio officia optio praesentium quasi quibusdam quo rem, repellendus rerum similique sunt unde vel, vero? Animi dolorem eius explicabo hic illo incidunt nemo quaerat quam, quia temporibus vel voluptatum?</p>
    </section>
    <section id="new-tv-container" class="container-fluid">
        <h2>Nouveautés Séries :</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid aperiam at atque cum debitis dignissimos eaque, enim esse et excepturi fuga fugiat harum hic incidunt ipsam, iste iure molestiae nam necessitatibus perferendis possimus, quam qui quibusdam recusandae sequi voluptatum. Accusamus adipisci aliquam atque consequatur, doloribus dolorum eaque earum esse est et eveniet ex, excepturi explicabo harum hic itaque iure laudantium magni maiores maxime modi molestiae nam necessitatibus nostrum numquam odio possimus quos reprehenderit rerum sint sit sunt suscipit vel veniam veritatis vero voluptate? A commodi eveniet ex excepturi iste neque nihil officiis optio possimus quos reprehenderit, suscipit tenetur voluptatem.</p>
    </section>
    <section id="popular-tv-container" class="container-fluid">
        <h2>Séries Populaires :</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aperiam corporis deserunt ipsum iste magni nam natus non quibusdam, rem similique, ullam vel voluptatibus! Ea fuga fugiat ipsum labore perferendis praesentium provident quasi. Ad adipisci amet assumenda consequatur culpa, cupiditate debitis deserunt doloremque eius, esse ex exercitationem expedita illum ipsum iste iure laudantium molestias neque nihil obcaecati omnis optio quod sapiente sequi sint suscipit ullam? Accusamus assumenda, aut debitis, distinctio dolor, expedita harum iste modi nostrum quibusdam quis reprehenderit veritatis vero. Aspernatur esse harum ipsa nemo obcaecati, provident rem. Animi beatae, dolore eos molestias natus necessitatibus nihil porro quibusdam sunt.</p>
    </section>

    <section id="new-movies-container" class="container-fluid">
        <h2>Nouveautés Films :</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis eligendi facilis perferendis quaerat quis voluptas, voluptates! Atque et illum impedit provident quisquam saepe sit, unde voluptates? Animi, consequuntur, cum ea exercitationem expedita fugiat inventore ipsa necessitatibus nihil, nisi odio porro quasi reprehenderit similique ut vitae voluptas voluptatem. Amet aperiam aut autem beatae cumque debitis deleniti, dolor dolorum eaque eum ex exercitationem illo, ipsa iste iure libero magni maxime nam nisi obcaecati odio perferendis possimus, quas repellendus reprehenderit voluptas voluptates. Adipisci cupiditate debitis dolor doloribus ea ipsa ipsam itaque iusto mollitia nam optio repellat, repellendus repudiandae sed sequi, soluta tempora ullam.</p>
    </section>
    <section id="popular-movies-container" class="container-fluid">
        <h2>Films Populaires :</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium ad aliquam amet, animi debitis dignissimos ducimus excepturi, explicabo ipsa nam nisi odit officia omnis porro quis ratione vitae? Ad adipisci animi aperiam consequuntur corporis dicta dignissimos ea error fugit in iste natus nisi nulla optio quis, saepe sequi, veniam! Commodi consequuntur corporis culpa cupiditate deserunt dicta dolor dolore dolores error expedita facere incidunt, inventore ipsum itaque magnam magni molestiae nesciunt odio officia optio praesentium quasi quibusdam quo rem, repellendus rerum similique sunt unde vel, vero? Animi dolorem eius explicabo hic illo incidunt nemo quaerat quam, quia temporibus vel voluptatum?</p>
    </section>
    <section id="new-tv-container" class="container-fluid">
        <h2>Nouveautés Séries :</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid aperiam at atque cum debitis dignissimos eaque, enim esse et excepturi fuga fugiat harum hic incidunt ipsam, iste iure molestiae nam necessitatibus perferendis possimus, quam qui quibusdam recusandae sequi voluptatum. Accusamus adipisci aliquam atque consequatur, doloribus dolorum eaque earum esse est et eveniet ex, excepturi explicabo harum hic itaque iure laudantium magni maiores maxime modi molestiae nam necessitatibus nostrum numquam odio possimus quos reprehenderit rerum sint sit sunt suscipit vel veniam veritatis vero voluptate? A commodi eveniet ex excepturi iste neque nihil officiis optio possimus quos reprehenderit, suscipit tenetur voluptatem.</p>
    </section>
    <section id="popular-tv-container" class="container-fluid">
        <h2>Séries Populaires :</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aperiam corporis deserunt ipsum iste magni nam natus non quibusdam, rem similique, ullam vel voluptatibus! Ea fuga fugiat ipsum labore perferendis praesentium provident quasi. Ad adipisci amet assumenda consequatur culpa, cupiditate debitis deserunt doloremque eius, esse ex exercitationem expedita illum ipsum iste iure laudantium molestias neque nihil obcaecati omnis optio quod sapiente sequi sint suscipit ullam? Accusamus assumenda, aut debitis, distinctio dolor, expedita harum iste modi nostrum quibusdam quis reprehenderit veritatis vero. Aspernatur esse harum ipsa nemo obcaecati, provident rem. Animi beatae, dolore eos molestias natus necessitatibus nihil porro quibusdam sunt.</p>
    </section>
@endsection
