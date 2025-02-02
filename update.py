#!/usr/env/python3

import json
import datetime
from pathlib import Path

import requests

BASE_URL = "https://fred.stlouisfed.org/graph/fredgraph.csv?mode=fred&fq=Daily"
MATURITIES = ["1MO", "3MO", "6MO", "1", "2", "3", "5", "7", "10", "20", "30"]

yields_path = Path("yields.json")
end = datetime.date.today()

if yields_path.exists():
    mtime = yields_path.stat().st_mtime
    start = datetime.datetime.fromtimestamp(mtime).date()
    json_str = yields_path.read_text()
    data = json.loads(json_str)
else:
    data = {}
    start = datetime.date(2019, 1, 1)


print(f"fetching {start} - {end} ...")

url = f"{BASE_URL}&cosd={start:%Y-%m-%d}&coed={end:%Y-%m-%d}&id=DGS"

for col, mat in enumerate(MATURITIES):

    print(mat)
    response = requests.get(url + mat)
    for line in response.text.split("\n")[1:-1]:
        timestamp, rate = line.split(",")
        if rate == ".":
            continue
        if timestamp not in data:
            data[timestamp] = [None] * 11
        data[timestamp][col] = float(rate)

json_str = json.dumps(data)
yields_path.write_text(json_str)
