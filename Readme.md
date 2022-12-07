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

        $builder = SerializerBuilder::create()
            ->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(
                    new IdenticalPropertyNamingStrategy()
                )
            )
            ->setCacheDir($cachePath)
            ->setDebug($debug)
        ;
        $serializer = $builder->build();

        // PSR-18 совместимый клиент
        $client = new Client();

        $request = new SendWaybillRequest();
        $request->waybill = 'xml content';
        $request->waybillFileName = 'name.xml';
        $request->waybillSignFileName = 'sign_name.sig';
        $request->waybillSign = 'sig_content';

        $logistics = new LogisticsDocuments($client, 'apikey', $serializer, 'URL'));
        $response = $logistics->sendWaybill($request);

        $response->transportationId;
```

## Сделаны и протестированы методы

- `v1/mintransgateway/uuid`
- `v1/documents/waybill`