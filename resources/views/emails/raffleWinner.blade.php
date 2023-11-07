<x-mail::message>
# Raffle Winner Notification

Dear [Username],

We are thrilled to inform you that you are the lucky winner of the raffle on **{{ config('app.name') }}**!

Congratulations on your win!

Raffle Details:
- Raffle Title: [Your Raffle Title]
- Prize: [Prize Description]
- Date of the Draw: [Draw Date]

To claim your prize, please follow these steps:

1. Contact our support team to verify your win and claim your prize.

<div style="text-align: left; margin-bottom: 1rem;">
    <a href="#" style="background-color: #215273; border-radius: .2rem; color: white; padding: 0.5rem 1rem; text-decoration: none; display: inline-block;"> <!-- Style the button -->
        Contact Support
    </a>
</div>

Best Regards,<br>
The {{ config('app.name') }} Team

---
If you have any inquiries, please feel free to email us at <a href="mailto:info@raffleitapp.com">info@raffleitapp.com</a>.
</x-mail::message>
