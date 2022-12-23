## Клиент API Контур Логистики.

---------------------------

- URL - https://kontur.ru/diadoc/logistika
- SWAGGER - https://logist-api-staging.kontur.ru/swagger/index.html
---------------------------

## Пример отправки ТРН

```php
Надо сделать свой локальный класс для сериализатора

declare(strict_types=1);

use GuzzleHttp\Client;
use MagDv\Logistics\LogisticsSerializer;

class LocalHttpClient implements HttpClientInterface
{

    public function getClient(): ClientInterface
    {
        // PSR-18 совместимый клиент
        return new Client(
            [
                'debug' => true,
            ]
        );
    }
}

class LocalSerializer extends LogisticsSerializer
{
    public function getCachePath(): ?string
    {
        return 'dfdf/df/df/df'; // здесь указываем путь, куда кешируем. Не обязательно, но желательно. Влияет на скорость
    }

    public function getIsDebug(): bool
    {
        return false; // тут надо указать, включать ли дебаг в дев режиме можете включить, чтобы видеть ошибки
    }
}
       
        $serializer = new LocalSerializer();
        $client = new LocalHttpClient();

        $request = new SendWaybillRequest();
        $request->waybill = 'xml content';
        $request->waybillFileName = 'name.xml';
        $request->waybillSignFileName = 'sign_name.sig';
        $request->waybillSign = 'sig_content';

        $logistics = new LogisticsDocuments($client, 'apikey', $srializer, 'URL'));
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