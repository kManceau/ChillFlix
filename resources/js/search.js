const movieGrid = document.querySelector(".movie-grid");
const tvGrid = document.querySelector(".tv-grid");
const searchInput = document.getElementById("search-input");
const baseUrl = '/search';

setUrlValue(baseUrl);

searchInput.addEventListener("input", async e => {
    window.history.pushState(null, null, baseUrl + '?search=' + searchInput.value);
    clearContainer(movieGrid);
    clearContainer(tvGrid);
    movieGrid.appendChild(loader());
    tvGrid.appendChild(loader());
    const movies = await searchMovies(searchInput.value);
    const tvs = await searchTV(searchInput.value);
    movieGrid.removeChild(document.querySelector('.spinner-border'));
    tvGrid.removeChild(document.querySelector('.spinner-border'));
    for (const movie of movies) {
        const card = itemCard(movie);
        movieGrid.appendChild(card);
    }
    for (const tv of tvs) {
        const card = itemCard(tv);
        tvGrid.appendChild(card);
    }
});

async function searchMovies(query) {
    const response = await fetch('/get/moviesearch/' + query);
    return await response.json();
}
async function searchTV(query) {
    const response = await fetch('/get/tvsearch/' + query);
    return await response.json();
}

function clearContainer(container) {
    while (container.firstChild) {
        container.removeChild(container.lastChild);
    }
}

function loader(){
    const loader = document.createElement("div");
    loader.classList.add("spinner-border");
    const loadingText = document.createElement("span");
    loadingText.textContent = "Loading...";
    loadingText.classList.add("visually-hidden");
    loader.appendChild(loadingText);
    return loader;
}

function itemCard(item){
    const title = item.original_title ?? item.original_name
    const card = document.createElement('a');
    card.classList.add("cards");
    card.href = "/movie/" + item.id;
    const cardTitle = document.createElement("h3");
    cardTitle.textContent = title;
    cardTitle.className = "h5 cards-title";
    const poster = document.createElement("img");
    poster.classList.add("cards-img");
    poster.alt = 'Affiche de ' + title;
    poster.src = "https://image.tmdb.org/t/p/w500/" + item.poster_path;
    card.appendChild(cardTitle);
    card.appendChild(poster);
    return card;
}

function setUrlValue(){
    const urlParams = new URLSearchParams(window.location.search);
    const search = urlParams.get("search");
    if(search){
        searchInput.value = search;
    }
}
