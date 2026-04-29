<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>New Contact Inquiry</title>
<style>
  body { margin: 0; padding: 0; background: #f4f4f4; font-family: Arial, sans-serif; }
  .wrapper { max-width: 600px; margin: 32px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
  .header { background: #c0272d; padding: 28px 32px; }
  .header h1 { margin: 0; color: #ffffff; font-size: 20px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; }
  .header p { margin: 4px 0 0; color: rgba(255,255,255,0.75); font-size: 13px; }
  .body { padding: 32px; }
  .label { font-size: 11px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: #c0272d; margin-bottom: 4px; }
  .value { font-size: 15px; color: #1a1a2e; margin-bottom: 20px; padding-bottom: 20px; border-bottom: 1px solid #e5e7eb; }
  .value:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
  .message-box { background: #f8f8f8; border-left: 3px solid #c0272d; padding: 16px; border-radius: 0 4px 4px 0; white-space: pre-wrap; font-size: 14px; color: #444; line-height: 1.7; }
  .footer { background: #f8f8f8; padding: 18px 32px; text-align: center; font-size: 12px; color: #aaa; border-top: 1px solid #e5e7eb; }
</style>
</head>
<body>
<div class="wrapper">
  <div class="header">
    <h1>REDS Electromechanical</h1>
    <p>New contact inquiry received</p>
  </div>
  <div class="body">
    <div class="label">Full Name</div>
    <div class="value">{{ $data['name'] }}</div>

    <div class="label">Phone Number</div>
    <div class="value">{{ $data['phone'] }}</div>

    @if(!empty($data['email']))
    <div class="label">Email Address</div>
    <div class="value">{{ $data['email'] }}</div>
    @endif

    <div class="label">Service of Interest</div>
    <div class="value">{{ $data['service'] }}</div>

    <div class="label">Message</div>
    <div class="value">
      <div class="message-box">{{ $data['message'] }}</div>
    </div>
  </div>
  <div class="footer">
    This email was sent from the contact form on {{ config('app.url') }}.<br>
    {{ now()->format('F j, Y \a\t g:i A') }}
    @if(!empty($data['email']))
    &nbsp;·&nbsp; Reply directly to this email to respond to {{ $data['name'] }}.
    @endif
  </div>
</div>
</body>
</html>
