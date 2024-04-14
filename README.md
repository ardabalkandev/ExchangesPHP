Kendim için PHP ile TCMB döviz kurlarını anlık olarak çekmek, canlı veriye ulaşılamadığında ise son kaydedilen kurları veritabanından çağırmak için oluşturduğum dosyayı paylaşıyorum.

Veritabanınızda 'exchanges' adlı bir tablo olmalı ve bu tabloya id (int), usd_buying (double), usd_selling (double), eur_buying (double), eur_selling (double) sütunları eklenmiş olmalı. Bu tabloya önceden tek satırlık bir veri elle eklenmiş olmalı.

Tablonuzu aşağıdaki SQL cümlesiyle oluşturabilirsiniz.

~~~
CREATE TABLE exchanges (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usd_buying DOUBLE,
  usd_selling DOUBLE,
  eur_buying DOUBLE,
  eur_selling DOUBLE
);
~~~
