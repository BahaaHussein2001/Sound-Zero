document.getElementByID("song_thief").addEventListener("submit",lyrictheif);

function lyrictheif(e){
    e.preventDefault();
    let title_of_song = document.getElementById("title").value;
    let artist_name = document.getElementById("artist").value;
}


const getLyrics=require("./getLyrics");
const getSOng = require("./getSong");
const getSong=require("./getSong")
const options={
    apiKey: '6OT9uJooiLJiODWlolZRCTKv8JfgM8hXggWsFgxZS3EfhFaf7WvYMRvyEQ32W3b9',
    title: title_of_song,
    artist: artist_name,
    optimizeQuery:true
}
getLyrics(options).then((lyrics)=>console.log(lyrics));
getSong(options).then((song)=>console.log('${song.lyrics}'));
