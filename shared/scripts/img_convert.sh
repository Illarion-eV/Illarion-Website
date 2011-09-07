dummy="$(mktemp).png"
convert -size 300x300 xc:\#$1 $dummy
convert -compose multiply $2 -channel RGB $dummy -composite $3
