<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New website enquiry</title>
</head>
<body style="margin: 0; padding: 24px; background: #f7f2e9; color: #202421; font-family: Arial, sans-serif; line-height: 1.6;">
    <div style="max-width: 640px; margin: 0 auto; padding: 32px; background: #fffdf8; border: 1px solid #ded5c8;">
        <h1 style="margin-top: 0; font-family: Georgia, serif; font-weight: normal;">New website enquiry</h1>

        <p><strong>Name:</strong> {{ $contact['name'] }}</p>
        <p><strong>Email:</strong> <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a></p>
        <p><strong>Phone:</strong> {{ $contact['phone'] ?? 'Not provided' }}</p>

        <h2 style="margin-bottom: 8px; font-family: Georgia, serif; font-weight: normal;">Message</h2>
        <div style="white-space: pre-wrap;">{{ $contact['message'] }}</div>
    </div>
</body>
</html>
