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
        
        $debug = false;  // в дев режиме можете включить, чтобы видеть ошибки

        $cachePath = 'bla/bla/bla' // Не обязательно, но желательно. Влияет на скорость

        // PSR-18 совместимый клиент
        $client = new Client();

        $request = new SendWaybillRequest();
        $request->waybill = 'xml content';
        $request->waybillFileName = 'name.xml';
        $request->waybillSignFileName = 'sign_name.sig';
        $request->waybillSign = 'sig_content';

        $logistics = new LogisticsDocuments($client, 'apikey', $cachePath, 'URL', $debug));
        $response = $logistics->sendWaybill($request);

        // Текущий статус ответа
        echo $response->statusCode;
        // Проверка, что удачный запрос
        echo $response->isOk();

        // Проверка статуса и вывод ошибки
        if (!$response->isOk()) {
         echo $response->error->message;
        }

        $response->transportationId;
```

## Сделаны и протестированы методы

- `v1/mintransgateway/uuid`
- `v1/documents/waybill`
- `v1/transportations`
- `v1/transportations/{id}`