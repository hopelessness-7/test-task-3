# Описание проекта

Тестовое задание. Проект представляет собой страницу вывода графиков, реализованную с использованием стека технологий Laravel 11 Sail, MySQL, Vue 3 и Quasar.

## Функциональность

Проект включает в себя следующие функциональные файлы:

* Фронтенд
    + `resources/js/components/BarChart.vue`: компонент для отображения столбчатых диаграмм
    + `resources/js/components/ChartComponent.vue`: компонент для отображения графиков
    + `resources/js/app.js`: основной файл приложения
* Бэкенд
    + `app/Services/ChartDataService.php`: сервис для генерации данных для графиков
    + `app/Http/Controllers/Api/v1/ChartDataController.php`: контроллер для обработки запросов на генерацию данных для графиков

## Установка проекта

1. Установите Docker и Docker Compose на вашу машину.
2. Клонируйте репозиторий проекта с помощью команды `git clone`.
3. Перейдите в директорию проекта и выполните команду `composer install` для установки зависимостей.
4. Выполните команду `./vendor/bin/sail up` для запуска контейнеров Docker.
5. Выполните команду `./vendor/bin/sail artisan migrate --seed` для создания таблиц в базе данных и заполнение её данными.
6. Выполните команду `npm install` для установки зависимостей Vue.js.
7. Выполните команду `npm run build` для сборки проекта.

## Запуск проекта

1. Выполните команду `./vendor/bin/sail up -d --build` для запуска контейнеров Docker, сборки контейнеров и работы в фоновом режиме
2. Откройте веб-браузер и перейдите по адресу `http://localhost`.

## Генерация данных для графиков

1. Нажмите кнопку "Сгенерировать" на странице /chart.
2. Сервер сгенерирует данные для графиков и отобразит их на странице.

## Используемые технологии

* Laravel 11
* Sail 
* MySQL 
* Vue 3 
* Quasar

### Примечание
В целях упрощения проекта, регистрация и авторизация пользователей не реализованы. Все функции доступны всем пользователям без ограничений.
