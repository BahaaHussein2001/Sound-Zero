import sys
import lyricsgenius
genius = lyricsgenius.Genius('6OT9uJooiLJiODWlolZRCTKv8JfgM8hXggWsFgxZS3EfhFaf7WvYMRvyEQ32W3b9')
song = genius.search_song(sys.argv[1], sys.argv[2])
print(song.lyrics)
song.save_lyrics()