Клиент API для https://kontur.ru/diadoc/logistika
Свагер https://logist-api-staging.kontur.ru/swagger/index.html
---------------------------

Клиент API Контур Логистики.

## Пример отправки ТРН

```php
<?php
use GuzzleHttp\Client;

declare(strict_types=1);

        // PSR-7 совместимый клиент
        $client = new Client();

        $request = new SendWaybillRequest();
        $request->waybill = 'xml content';
        $request->waybillFileName = 'name.xml';
        $request->waybillSignFileName = 'sign_name.sig';
        $request->waybillSign = 'sig_content';

        $logistics = new LogisticsDocuments($client, 'apikey', 'URL'));
        $response = $logistics->sendWaybill($request);

        $response->transportationId;
```

## Тесты

Есть
