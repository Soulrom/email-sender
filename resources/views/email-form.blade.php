<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
    <h1>Send an Email</h1>

    @if(session('error'))
        <p style="color: red">{{ session('error') }}</p>
    @endif

    <form action="{{ url('/send-email') }}" method="POST">
        @csrf
        <label for="from">From:</label>
        <input type="email" name="from" required>
        <br>

        <label for="to">To:</label>
        <input type="email" name="to" required>
        <br>

        <label for="cc">CC (optional):</label>
        <input type="email" name="cc">
        <br>

        <label for="subject">Subject:</label>
        <input type="text" name="subject" required>
        <br>

        <label for="type">Type:</label>
        <select name="type">
            <option value="text">Text</option>
            <option value="html">HTML</option>
        </select>
        <br>

        <label for="body">Body:</label>
        <textarea name="body" required></textarea>
        <br>

        <button type="submit">Send Email</button>
    </form>
</body>
</html>