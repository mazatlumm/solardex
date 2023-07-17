//AT COMMAND UNTUK KIRIM DATA KE SERVER
//AT+SAPBR=1,1
//AT+HTTPINIT
//
//AT+HTTPPARA="URL","http://api.thingspeak.com/update?api_key=XQ1JAB4W1F3I1FD6&field1=50"
//AT+HTTPPARA="URL","http://alicestech.com/Solardex/api/sensor?id_device=SLDXG001&v=12.09&i=0.33&p=3.90&e=0.00&lat=-7.618158&lon=112.256488&reset_code=404"
//
//// set http action type 0 = GET, 1 = POST, 2 = HEAD
//AT+HTTPACTION=0
//AT+HTTPREAD
//AT+HTTPTERM
//AT+SAPBR=0,1

//AT COMMAND UNTUK MENDAPATKAN LOKASI GPS
//AT+CGNSPWR=1
//AT+CGPSSTATUS?
//AT+CGNSINF
