# Тестовое задание для компании EasyCode

Задание заключалось в создании системы смены настроек пользователя.

Для реализации этого задания мною были использованы следующие языки и технологии:
- PHP (Laravel)
- HTML
- CSS (Bootstrap)
- sqlite

# Что необходимо для запуска проекта

1) Клонировать проект с гит репозитория в папку на локальном сервере
2) Выполнить миграции для базы данных
3) Выполнить следующие команды:
   - Из корневой папки: cd test_for_EasyCode
   - php artisan serve
   - Из терминала компьютера ssh -R 80:127.0.0.1:8000 serveo.net
   - url адрес сайта перенести в файл .env в APP_URL
   - Открыть второй терминал проекта и сделать следующие команды:
   - cd test_for_EasyCode
   - php artisan telegraph:set-webhook 

После этого можно пользоваться сайтом. 
Авторизация и регистрация выполнена силами laravel. На данный момент доступно подтверждение действий 
с помощью телеграмм бота и почты. Изменение настроек по номеру телефона не предоставилось возможным реализовать, так как 
сервисы по отправке смс сообщений требуют заключение договора на оказание услуг.

При возникновении каких либо вопросов по проекту и его функционалу - писать в телеграмм @Talibibra

