<x-mail::message>
# Account Registration Successful

Dear [Username],

We are delighted to inform you that your account on **{{ config('app.name') }}** has been successfully registered. Welcome to our platform!

Your account is now ready for you to access and enjoy our services.

Account Details:
- Username: [Your Username]
- Email: [Your Email]

If you have any questions or need assistance, please don't hesitate to reach out to our support team.

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
