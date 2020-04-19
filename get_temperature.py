import time
import board
import busio
import digitalio
import adafruit_max31855
import json

spi = busio.SPI(board.SCK, MOSI=board.MOSI, MISO=board.MISO)
cs = digitalio.DigitalInOut(board.D5)
max31855 = adafruit_max31855.MAX31855(spi, cs)
temperature = max31855.temperature
print (temperature)