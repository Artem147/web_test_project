# Web Test Job

Тестовое задание с страницей добавления комментариев к контенту.

## Запуск проекта

### Инициализация БД
Прежде чем начать использовать проект необходимо проинициализировать базу данных. В файле `initialize_database.php` указать параметры подключения, затем запустить скрипт инициализации:
```
cd backend
php initialize_database.php
```
### Запуск серверов backend и frontend
Для запуска проекта необходимо установить зависимости , перейти в директорию `frontend` и запустить оба сервера.
```
cd backend
composer install
cd ../frontend
npm install
npm start
```
