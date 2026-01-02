# [valve.hogwild.uk](https://valve.hogwild.uk/)
## Deploying
1. Make your changes
1. Use `git add file.txt` for each file edited (don't use -A to avoid temp files and other guff getting pushed)
1. Use `git commit -m 'i did this stuff'` to track the changes
1. Use `git push` to push the changes to the GitHub remote
2. Run `bash scripts/deploy.sh` to update the live site in a single command
