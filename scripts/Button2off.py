#!/usr/bin/env python2.7



import RPi.GPIO as GPIO
import time
import cgitb
cgitb.enable() 

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(16, GPIO.OUT)
#GPIO.setup(20, GPIO.OUT)

state = True

#endless loop, on/off for 1 second
GPIO.output(16,True)
	
