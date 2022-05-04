##  Реализовать API сервер: 
Взаимодействие с пользователем происходит посредством HTTP запросов к API серверу. 
Все ответы представляют собой JSON объекты. 

###  Сервер реализует следующие методы: 
    - [x] Выдача всех организаций c пагинацией.
    - [x] Выдача информации об организациях по их идентификаторам.
    - [x] Поиск организации по Коду ЄДРПОУ.
    - [x] Поиск организации по названию c пагинацией.

###  Поля таблицы Организация  :
- id, 
- Код ЄДРПОУ, 
- Короткое название, 
- Полное название.

## Установка:

#### Выполнить команду:
    - [x] composer install .
    - [x] php artisan key:generate.
    - [x] Переименовать файл .env.example в файл .env и настроить подключение к базе данных и пр.
    - [x] php artisan migrate --seed.
    - [x] php artisan test


## Список API routers с методами.
#### Выдача всех организаций c пагинацией. метод:GET, URL:http:{URL}/api/v1/companies
    -  Нет ошибок :
* 1-Ответ 200
* 2-Тело ответа на запрос
  {
  "Company": [
  {
  "id": 25,
  "edrpou": "00644099",
  "full_name": "ZAO Roberts-McLaughlin Group",
  "short_name": "Roberts-McLaughlin"
  },
  {
  "id": 18,
  "edrpou": "01232325",
  "full_name": "ZAO Hodkiewicz-Wunsch Group",
  "short_name": "Hodkiewicz-Wunsch"
  },

  ],
  "links": {
  "first": "http://listcompanies/api/v1/companies?page=1",
  "last": "http://listcompanies/api/v1/companies?page=3",
  "prev": null,
  "next": "http://listcompanies/api/v1/companies?page=2"
  },
  "meta": {
  "current_page": 1,
  "from": 1,
  "last_page": 3,
  "links": [
  {
  "url": null,
  "label": "&laquo; Previous",
  "active": false
  },
  {
  "url": "http://listcompanies/api/v1/companies?page=1",
  "label": "1",
  "active": true
  },
  {
  "url": "http://listcompanies/api/v1/companies?page=2",
  "label": "2",
  "active": false
  },
  {
  "url": "http://listcompanies/api/v1/companies?page=3",
  "label": "3",
  "active": false
  },
  {
  "url": "http://listcompanies/api/v1/companies?page=2",
  "label": "Next &raquo;",
  "active": false
  }
  ],
  "path": "http://listcompanies/api/v1/companies",
  "per_page": 10,
  "to": 10,
  "total": 30
  }
  }

    -  Ошибка :
* 1-Ответ 404
* 2-Тело ответа на запрос

  {
  "Company": []
  }


#### Выдача информации об организациях по их идентификаторам. метод:GET, URL:http:{URL}/api/v1/companies/{id}
    -  Нет ошибок :
* 1-Ответ 200
* 2-Тело ответа на запрос
  {
  "Company": {
  "id": 23,
  "edrpou": "04039846",
  "full_name": "ZAO Block Ltd Ltd",
  "short_name": "Block Ltd"
  }
  }
    -  Ошибка :
* 1-Ответ 404
* 2-Тело ответа на запрос

  {
  "Company": []
  }


#### Поиск организации по Коду ЄДРПОУ. метод:GET, URL:http:{URL}/api/v1/companies/edrpou/{edrpou}
    -  Нет ошибок :
* 1-Ответ 200
* 2-Тело ответа на запрос
  {
  "Company": {
  "id": 23,
  "edrpou": "04039846",
  "full_name": "ZAO Block Ltd Ltd",
  "short_name": "Block Ltd"
  }

    -  Ошибка :
* 1-Ответ 404
* 2-Тело ответа на запрос

  {
  "Company": []
  }


#### Поиск организации по названию c пагинацией. метод:GET, URL:http:{URL}/api/v1/companies/name/{name}
    -  Нет ошибок :
* 1-Ответ 200
* 2-Тело ответа на запрос  
{
  "Company": [
  {
  "id": 1,
  "edrpou": "14598609",
  "full_name": "AO Pouros Group Group",
  "short_name": "Pouros Group"
  },
  {
  "id": 2,
  "edrpou": "02519319",
  "full_name": "AO Dooley-Quigley and Sons",
  "short_name": "Dooley-Quigley"
  },
  {
  "id": 3,
  "edrpou": "60442567",
  "full_name": "ZAO Krajcik, Reichel and Collier Ltd",
  "short_name": "Krajcik, Reichel and Collier"
  },
  {
  "id": 6,
  "edrpou": "46819215",
  "full_name": "ZAO Glover Group LLC",
  "short_name": "Glover Group"
  },
 
  ],
  "links": {
  "first": "http://listcompanies/api/v1/companies/name/AO?page=1",
  "last": "http://listcompanies/api/v1/companies/name/AO?page=2",
  "prev": null,
  "next": "http://listcompanies/api/v1/companies/name/AO?page=2"
  },
  "meta": {
  "current_page": 1,
  "from": 1,
  "last_page": 2,
  "links": [
  {
  "url": null,
  "label": "&laquo; Previous",
  "active": false
  },
  {
  "url": "http://listcompanies/api/v1/companies/name/AO?page=1",
  "label": "1",
  "active": true
  },
  {
  "url": "http://listcompanies/api/v1/companies/name/AO?page=2",
  "label": "2",
  "active": false
  },
  {
  "url": "http://listcompanies/api/v1/companies/name/AO?page=2",
  "label": "Next &raquo;",
  "active": false
  }
  ],
  "path": "http://listcompanies/api/v1/companies/name/AO",
  "per_page": 10,
  "to": 10,
  "total": 15
  }
  }

    -  Ошибка :
* 1-Ответ 404
* 2-Тело ответа на запрос

  {
  "Company": []
  }
## Стартовая страница.
- public\index.php.

## Использованы :
- Php 8
- Laravel 9
- MySQL 8
- Composer

