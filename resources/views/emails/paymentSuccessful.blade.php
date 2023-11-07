<x-mail::message>
# Payment Successful

Dear [Username],

We are thrilled to inform you that your payment for your **{{ config('app.name') }}** account has been successfully processed. Thank you for choosing our services.

To access your account or for any further actions, please follow these steps:

1. Click on the following link to log in to your account:

[Log In](https://raffleitapp/login)

**Note:** Please keep your login credentials secure.

2. If you have any questions or need assistance, please don't hesitate to reach out to our support team.

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
