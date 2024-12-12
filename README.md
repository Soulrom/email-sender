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
- Тип листа (text або html)
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

1. **Встановлення XAMPP:**
    - Завантажте та встановіть [XAMPP](https://www.apachefriends.org/index.html).
    - Запустіть XAMPP та увімкніть Apache та MySQL.

2. **Клонувати репозиторій:**
    ```bash
    git clone https://github.com/Soulrom/email-sender.git
    ```

3. **Перейти в директорію проекту:**
    ```bash
    cd email-sender
    ```

4. **Встановити залежності за допомогою Composer:**
    - Встановіть Composer, якщо ще не встановлено: [Composer](https://getcomposer.org/download/).
    - Встановіть залежності:
    ```bash
    composer install
    ```

5. **Налаштувати базу даних:**
    - У XAMPP запустіть `phpMyAdmin` (за замовчуванням доступно за адресою `http://localhost/phpmyadmin`).
    - Створіть нову базу даних для вашого проєкту (наприклад, `email_sender`).
    - Налаштуйте з'єднання з базою даних у файлі `.env`:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=email_sender  # Назва вашої бази даних
    DB_USERNAME=root           # Стандартний користувач XAMPP
    DB_PASSWORD=               # Стандартний пароль порожній
    ```

6. **Запустити міграції для створення таблиць у базі даних:**
    ```bash
    php artisan migrate
    ```

## Технології

- PHP
- Laravel
- PHPMailer
- MySQL (для збереження даних)
- Mailtrap (SMTP сервер для тестування)

## Ліцензія

Цей проєкт ліцензується під ліцензією MIT - подробиці дивіться у файлі [LICENSE](LICENSE).
