## Клиент API Контур Логистики.

---------------------------

- URL - https://kontur.ru/diadoc/logistika
- SWAGGER - https://logist-api-staging.kontur.ru/swagger/index.html
---------------------------

## Пример отправки ТРН

```php
<?php
use GuzzleHttp\Client;

declare(strict_types=1);

        // PSR-18 совместимый клиент
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

## Сделаны и протестированы методы

- `v1/mintransgateway/uuid`
- `v1/documents/waybill`