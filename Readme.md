## Клиент API Контур Логистики.

---------------------------

- URL - https://kontur.ru/diadoc/logistika
- API - https://developer.kontur.ru/doc/logistics.api
---------------------------

# Внимание!!! 
## Библиотека пока активно редактируется и могут быть несовместимые изменения. Учтите этот момент.

## Пример отправки ТРН

```php
Надо сделать свой локальный класс для сериализатора

declare(strict_types=1);

use GuzzleHttp\Client;
use MagDv\Logistics\ClientConfig;

class LocalConfig extends ClientConfig
{
    public function getCachePath(): ?string
    {
        return 'dfdf/df/df/df'; // здесь указываем путь, куда кешируем. Не обязательно, но желательно. Влияет на скорость
    }

    public function getIsDebug(): bool
    {
        return false; // тут надо указать, включать ли дебаг в дев режиме можете включить, чтобы видеть ошибки
    }

    public function getUrl(): string
    {
        return 'URL к апи';
    }

    public function getApiKey(): string
    {
        return 'apiKey';
    }

    public function getClient(): HttpClientInterface
    {
         // PSR-18 совместимый клиент
        return new Client();
    }
}
        $request = new SendWaybillRequest();
        $request->waybill = 'xml content';
        $request->waybillFileName = 'name.xml';
        $request->waybillSignFileName = 'sign_name.sig';
        $request->waybillSign = 'sig_content';

        $logistics = new LogisticsDocuments(new LocalConfig());
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

### Минтранс

- `GET v1/mintransgateway/uuid`

### Документы (Транспортные накладные)

- `POST v1/documents/waybill` — Отправка ТРН
- `POST v1/documents/waybill/draft` — Черновик документа

### Перевозки

- `GET v1/transportations` — Список перевозок
- `GET v1/transportations/{id}` — Информация о перевозке
- `GET v1/transportations/{id}/print-form` — Печатная форма ТРН
- `GET v1/transportations/{id}/titles/{titleId}` — Титул грузополучателя
- `GET v1/transportations/{id}/full-docflow` — Полный документооборот перевозки
- `PUT v1/transportations/{id}/archive` — Архивация/разархивация перевозки
- `POST v1/transportations/documents/draft` — Черновик документов для перевозки

### Организации

- `GET v1/organizations/requisites` — Реквизиты организации

## Работа с ошибками

Класс `Error` содержит метод `getAllErrorMessagesByJsonString()`, который возвращает полный список ошибок в JSON-формате:

```php
if (!$response->isOk()) {
    // Отдельное сообщение
    echo $response->error->message;
    
    // Все ошибки в JSON
    echo $response->error->getAllErrorMessagesByJsonString();
}
```