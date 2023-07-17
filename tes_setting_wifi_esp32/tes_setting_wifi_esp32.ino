#include <WiFi.h>
#include <FS.h>
#include <AsyncTCP.h>
#include <ESPAsyncWebServer.h>
 
const char *ssid = "SLDX-001";
const char *password = "12345678";
String SSIDWIFI = "";
String PASSWORDWIFI = "";
String PESAN = "";
String ScanWiFi = "";
AsyncWebServer server(80);
 
void setup(){
  Serial.begin(115200);

  //WiFi Manager Start Here  
  WiFi.softAP(ssid, password);
  Serial.println();
  Serial.print("IP address: ");
  Serial.println(WiFi.softAPIP());
  server.on("/", HTTP_GET, [](AsyncWebServerRequest *request){
    int paramsNr = request->params();
    Serial.println(paramsNr);
 
    for(int i=0;i<paramsNr;i++){
        AsyncWebParameter* p = request->getParam(i);
        String KeyParam = p->name();
        String ValParam = p->value();
        if(KeyParam == "ssid"){
          SSIDWIFI = ValParam;
        }
        if(KeyParam == "pass"){
          PASSWORDWIFI = ValParam;
        }
        if(KeyParam == "pesan"){
          PESAN = ValParam;
          if(PESAN = "hai"){
            AsyncWebServerResponse *response = request->beginResponse(200, "text/plain", "hello");
            response->addHeader("Access-Control-Allow-Origin", "*");
            request->send(response);
            Serial.println("Cek Pesan: " + PESAN);
          }
        }
    }
    if(SSIDWIFI != "" || PASSWORDWIFI != ""){
    const char *ssidStation = SSIDWIFI.c_str();
    const char *passStation = PASSWORDWIFI.c_str();
    Serial.println(ssidStation);
    Serial.println(passStation);
    WiFi.begin(ssidStation, passStation);
    while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
    }

    Serial.println("");
    Serial.println("WiFi connected");
    Serial.println("IP address: ");
    Serial.println(WiFi.localIP());
    AsyncWebServerResponse *response = request->beginResponse(200, "text/plain", "success");
    response->addHeader("Access-Control-Allow-Origin", "*");
    request->send(response);
    }
  });
  server.begin();
}
 
void loop(){}
