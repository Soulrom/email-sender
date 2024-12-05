<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Email;  // Модель для збереження в базі
use Illuminate\Support\Str;

class EmailController extends Controller
{
    // Відображення форми
    public function showForm()
    {
        return view('email-form');  // Переконайтесь, що ваша форма називається email-form.blade.php
    }

    // Метод для обробки відправлення email
    public function sendEmail(Request $request)
    {
        // Валідація запиту
        $request->validate([
            'from' => 'required|email',
            'to' => 'required|email',
            'subject' => 'required|string',
            'type' => 'required|in:text,html',
            'body' => 'required|string',
        ]);

        // Створення нового екземпляру PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Налаштування серверу SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io'; // Використовуйте свій SMTP сервер
            $mail->SMTPAuth = true;
            $mail->Username = 'e55e11cb747f24'; // Ваш SMTP користувач
            $mail->Password = '478fd8fdc28b41'; // Ваш SMTP пароль
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 2525;

            // Встановлення адрес
            $mail->setFrom($request->input('from'));
            $mail->addAddress($request->input('to'));
            if ($request->input('cc')) {
                $mail->addCC($request->input('cc'));
            }

            // Контент листа
            $mail->isHTML($request->input('type') == 'html');
            $mail->Subject = $request->input('subject');
            $mail->Body = $request->input('body');

            // Відправлення листа
            $mail->send();

            // Генерація UUID для збереження в БД
            $uuid = (string) Str::uuid();

            // Збереження даних в базі
            Email::create([
                'uuid' => $uuid,
                'from' => $request->input('from'),
                'to' => $request->input('to'),
                'cc' => $request->input('cc'),
                'subject' => $request->input('subject'),
                'type' => $request->input('type'),
                'body' => $request->input('body'),
                'ip' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);

            // Перенаправлення на сторінку успіху
            return redirect()->route('email.success', ['uuid' => $uuid]);

        } catch (Exception $e) {
            return back()->with('error', 'Email could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        }
    }

    // Метод для відображення сторінки успіху
    public function success($uuid)
    {
        // Отримання запису з БД за UUID
        $email = Email::where('uuid', $uuid)->firstOrFail();

        // Повертаємо вигляд успішного відправлення
        return view('success', compact('email'));
    }
}