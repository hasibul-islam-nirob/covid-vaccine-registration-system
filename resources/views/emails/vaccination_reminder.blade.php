<p>Dear {{ $user->name }},</p>

<p>This is a reminder that your vaccination is scheduled for {{ $scheduledDate }} at {{ $user->registration->vaccineCenter->name }}.</p>

<p>Please arrive on time.</p>

<p>Thank you.</p>