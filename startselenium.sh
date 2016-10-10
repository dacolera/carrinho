#!/bin/bash

java -jar /usr/local/lib/selenium/selenium-server-standalone.jar -role hub -trustAllSSLCertificates  &
java -jar /usr/local/lib/selenium/selenium-server-standalone.jar -role node  -hub http://127.0.0.1:4444/grid/register & 
