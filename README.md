Kendim için PHP ile TCMB döviz kurlarını anlık olarak çekmek, canlı veriye ulaşılamadığında ise son kaydedilen kurları veritabanından çağırmak için oluşturduğum dosyayı paylaşıyorum.

Veritabanınızda 'exchanges' adlı bir tablo olmalı ve bu tabloya id (int), usd_buying (double), usd_selling (double), eur_buying (double), eur_selling (double) sütunları eklenmiş olmalı. Bu tabloya önceden tek satırlık bir veri elle eklenmiş olmalı. Bunları aşağıdaki SQL komutuyla gerçekleştirebilirsiniz.

~~~
CREATE TABLE exchanges (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usd_buying DOUBLE,
  usd_selling DOUBLE,
  eur_buying DOUBLE,
  eur_selling DOUBLE
);
INSERT INTO exchanges SET usd_buying = 0, usd_selling = 0, eur_buying = 0, eur_selling = 0;
~~~

Ayrıca, X (Twitter)'de @redfox_tr önerisi ile CURL ile çalışan ikinci bir dosya ekledim. Bu dosya da çektiği kurları, belirttiğiniz yoldaki dosyaya XML olarak kaydeder ve buradan dilediğiniz kurun değerlerini çekebilirsiniz.
