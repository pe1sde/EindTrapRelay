import RPi.GPIO as GPIO
import time
# controleer de schakelaar
def check(pin):
        GPIO.wait_for_edge(22, GPIO.BOTH)
        print str (GPIO.input(22))
        return
# to use Raspberry Pi board pin numbers
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
# set up GPIO input channel
GPIO.setup(22, GPIO.OUT)
# check GPIO8 50 times
for i in range(0,50):
        check(22)
GPIO.cleanup()
