let playlist_frame = document.getElementById("playlist");
let ancre_playlist = document.querySelectorAll("#ancre_playlist");

ancre_playlist.forEach(function(item, dix) {
    item.addEventListener('click', function(e) {
        console.log(item.dataset.target);
        playlist_frame.src = item.dataset.target;
    })
})