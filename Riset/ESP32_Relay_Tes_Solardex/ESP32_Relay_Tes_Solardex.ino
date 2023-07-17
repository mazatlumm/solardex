char a;
int Relay = 5;
void setup() {
  // put your setup code here, to run once:
Serial.begin(9600);
pinMode(Relay, OUTPUT);
}

void loop() {
  // put your main code here, to run repeatedly:
if(Serial.available() > 0){
  a = Serial.read();
  Serial.println(a);

  if(a == 'a'){
    digitalWrite(Relay, HIGH); //Terhubung ke Load
  }
  if(a == 's'){
     digitalWrite(Relay, LOW);
  }
}
}
