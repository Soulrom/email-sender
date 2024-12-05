<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Email Sender

Цей проєкт дозволяє відправляти електронні листи через форму, з використанням SMTP-сервера Mailtrap. Він реалізує можливість введення відправника, одержувача, теми, тіла листа та типу контенту (текстовий або HTML).

## Опис проєкту

Проєкт має на меті забезпечити просту форму для відправки електронних листів із можливістю вказати:

- Відправник
- Одержувач
- Тема листа
- Тип листа (текстовий або HTML)
- Тіло листа

Після заповнення форми лист відправляється через SMTP сервер (Mailtrap для тестування), і всі дані зберігаються в базі даних.

## Функціональність

1. **Форма відправлення листа** - користувач заповнює форму, вказуючи:
    - Відправник
    - Одержувач
    - Тема
    - Тип листа (text або html)
    - Тіло листа
2. **Відправка листа** - після заповнення форми лист відправляється через SMTP сервер.
3. **Збереження в базі даних** - всі дані про відправлений лист зберігаються в базі даних, включаючи IP-адресу та user agent.
4. **Сторінка успіху** - після відправлення листа користувач перенаправляється на сторінку успіху з деталями листа.

## Інсталяція

1. Клонувати репозиторій:

    ```bash
    git clone https://github.com/Soulrom/email-sender.git
    ```

2. Перейти в директорію проекту:

    ```bash
    cd email-sender
    ```

3. Встановити залежності за допомогою Composer:

    ```bash
    composer install
    ```

4. Створити базу даних та налаштувати з'єднання у файлі `.env`.

5. Запустити міграції для створення таблиць у базі даних:

    ```bash
    php artisan migrate
    ```

6. Запустити сервер:

    ```bash
    php artisan serve
    ```

7. Тепер ви можете перейти до форми за адресою:

    ```
    http://127.0.0.1:8000/email-sender
    ```

## Технології

- PHP
- Laravel
- PHPMailer
- MySQL (для збереження даних)
- Mailtrap (SMTP сервер для тестування)

## Ліцензія

Цей проєкт ліцензується під ліцензією MIT - подробиці дивіться у файлі [LICENSE](LICENSE).
