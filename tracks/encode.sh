for file in *.flac; do
  ffmpeg -i "$file" -c:a libmp3lame -q:a 0 -map_metadata 0 -id3v2_version 3 -filter:a "dynaudnorm=p=0.9:s=5" "${file%}.mp3"
done

for file in *.wav; do
  ffmpeg -i "$file" -c:a libmp3lame -q:a 0 -map_metadata 0 -id3v2_version 3 -filter:a "dynaudnorm=p=0.9:s=5" "${file%}.mp3"
done

for file in *.mp4; do
  ffmpeg -i "$file" -c:a libmp3lame -q:a 0 -map_metadata 0 -id3v2_version 3 -filter:a "dynaudnorm=p=0.9:s=5" "${file%}.mp3"
done
