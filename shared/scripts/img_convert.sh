
# Farben von Images multiplizieren
#
# Parameter:
# 1: Farbcodierung (ohne Raute)
# 2: Input-file (mit Pfadangabe und Dateiendung)
# 3: Output-file (mit Pfadangabe und Dateiendung)
#

dummy="$(mktemp).png"
convert -size 300x300 xc:\#$1 $dummy
convert -compos