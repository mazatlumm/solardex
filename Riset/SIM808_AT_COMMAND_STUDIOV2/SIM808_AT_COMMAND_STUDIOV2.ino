#include <SoftwareSerial.h>
SoftwareSerial mySerial(10, 11); // RX, TX
int PowerKey = 6;

void setup() {
  Serial.begin(9600);
//  Serial1.begin(9600);
  while (!Serial) {
    ;
  }
  mySerial.begin(9600);
  pinMode(PowerKey, OUTPUT);
  PowerGSM();
}

void loop() { // run over and over
  if (mySerial.available()) {
    Serial.write(mySerial.read());
  }
  if (Serial.available()) {
    mySerial.write(Serial.read());
  }
//  if (Serial1.available()) {
//    Serial.write(Serial1.read());
//  }
//  if (Serial.available()) {
//    Serial1.write(Serial.read());
//  }
}

void PowerGSM(){
  digitalWrite(PowerKey, LOW);
  delay(2000);
  digitalWrite(PowerKey, HIGH);
}
