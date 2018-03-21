import requests
import time


while True:
	r = requests.get("http://localhost/Moonbuggy/database.php")
	
	time.sleep(1)
	print(r.status_code)
