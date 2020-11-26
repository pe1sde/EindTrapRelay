import urllib
import wiringpi
import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM) 
GPIO.setup(22, GPIO.IN)


url1 = "http://192.168.178.94/relay-status1.txt"
url2 = "http://192.168.178.94/relay-status2.txt"
url3 = "http://192.168.178.94/relay-status3.txt"

wiringpi.wiringPiSetupGpio()
wiringpi.pinMode(22,1)
wiringpi.pinMode(23,1)
wiringpi.pinMode(24,1)
wiringpi.pinMode(25,1)


while 1:
	relaystatus1 = urllib.urlopen(url1).read(1)
	relaystatus2 = urllib.urlopen(url2).read(1)
	relaystatus3 = urllib.urlopen(url3).read(1)
	if relaystatus1 == "1":
		wiringpi.digitalWrite(22,1)
		wiringpi.digitalWrite(25,1)
	elif relaystatus1 == "0":
		wiringpi.digitalWrite(22,0)
		wiringpi.digitalWrite(25,0)

	if relaystatus2 == "1":
		wiringpi.digitalWrite(24,1)
	elif relaystatus2 == "0":
		wiringpi.digitalWrite(24,0)

	if relaystatus3 == "1":
		wiringpi.digitalWrite(23,1)
	elif relaystatus3 == "0":
		wiringpi.digitalWrite(23,0)

	time.sleep(0.1)
