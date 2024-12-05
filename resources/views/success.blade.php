<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Sent Successfully</title>
</head>
<body>
    <h1>Email Sent Successfully</h1>
    <p><strong>From:</strong> {{ $email->from }}</p>
    <p><strong>To:</strong> {{ $email->to }}</p>
    @if($email->cc)
        <p><strong>CC:</strong> {{ $email->cc }}</p>
    @endif
    <p><strong>Subject:</strong> {{ $email->subject }}</p>
    <p><strong>Type:</strong> {{ ucfirst($email->type) }}</p>

    <h2>Body:</h2>
    <div>
        @if($email->type == 'html')
            <iframe srcdoc="{{ $email->body }}" width="100%" height="400px"></iframe>
        @else
            <pre>{{ $email->body }}</pre>
        @endif
    </div>
</body>
</html>