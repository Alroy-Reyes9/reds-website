<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>New Booking Request</title>
<style>
  body { margin: 0; padding: 0; background: #f4f4f4; font-family: Arial, sans-serif; }
  .wrapper { max-width: 600px; margin: 32px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
  .header { background: #1a1a2e; padding: 28px 32px; border-bottom: 4px solid #c0272d; }
  .header h1 { margin: 0; color: #ffffff; font-size: 20px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; }
  .header p { margin: 4px 0 0; color: rgba(255,255,255,0.65); font-size: 13px; }
  .body { padding: 32px; }
  .section-title { font-size: 11px; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #c0272d; background: #fff5f5; padding: 6px 10px; border-radius: 4px; margin: 28px 0 16px; }
  .section-title:first-child { margin-top: 0; }
  .label { font-size: 11px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase; color: #888; margin-bottom: 3px; }
  .value { font-size: 15px; color: #1a1a2e; margin-bottom: 18px; padding-bottom: 18px; border-bottom: 1px solid #f0f0f0; }
  .value:last-of-type { border-bottom: none; }
  .highlight { background: #fff8e1; border: 1px solid #ffe082; border-radius: 6px; padding: 16px 20px; display: inline-block; }
  .highlight .label { color: #b45309; }
  .highlight .val { font-size: 16px; font-weight: 700; color: #92400e; }
  .schedule-grid { display: flex; gap: 16px; }
  .schedule-grid > div { flex: 1; background: #f8f8f8; border-radius: 6px; padding: 14px; }
  .message-box { background: #f8f8f8; border-left: 3px solid #c0272d; padding: 16px; border-radius: 0 4px 4px 0; white-space: pre-wrap; font-size: 14px; color: #444; line-height: 1.7; }
  .footer { background: #f8f8f8; padding: 18px 32px; text-align: center; font-size: 12px; color: #aaa; border-top: 1px solid #e5e7eb; }
</style>
</head>
<body>
<div class="wrapper">
  <div class="header">
    <h1>REDS Electromechanical</h1>
    <p>New service booking request</p>
  </div>
  <div class="body">
    <div class="section-title">Client Information</div>

    <div class="label">Full Name</div>
    <div class="value">{{ $data['name'] }}</div>

    <div class="label">Phone Number</div>
    <div class="value">{{ $data['phone'] }}</div>

    <div class="label">Email Address</div>
    <div class="value">{{ $data['email'] }}</div>

    <div class="label">Service Address</div>
    <div class="value">{{ $data['address'] }}</div>

    <div class="section-title">Service Requested</div>

    <div class="label">Service Type</div>
    <div class="value">{{ $data['service'] }}</div>

    <div class="section-title">Preferred Schedule</div>

    <div class="label">Date</div>
    <div class="value">{{ \Carbon\Carbon::parse($data['preferred_date'])->format('F j, Y') }}</div>

    <div class="label">Time Slot</div>
    <div class="value">{{ $data['preferred_time'] }}</div>

    @if(!empty($data['message']))
    <div class="section-title">Additional Notes</div>
    <div class="value">
      <div class="message-box">{{ $data['message'] }}</div>
    </div>
    @endif
  </div>
  <div class="footer">
    This booking request was submitted via {{ config('app.url') }}.<br>
    {{ now()->format('F j, Y \a\t g:i A') }}
    &nbsp;·&nbsp; Reply directly to this email to contact {{ $data['name'] }}.
  </div>
</div>
</body>
</html>
