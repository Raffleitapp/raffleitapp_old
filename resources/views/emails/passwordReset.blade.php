<x-mail::message>
# Password Reset

Dear [Username],
Inorder to reset your password, use the link below:

We have received a request to reset the password for your
**{{ config('app.name') }}** account. To reset your password, please follow these steps:

1. Click on the following link to reset your password:

[Reset password link](https://raffleitapp/passwordreset)

**Note:** This link will expire in [Expiration Time], so make sure to complete the process promptly.

2. If you did not request this password reset, 
please disregard this email. Your account's security is important to us.

If you didn't request for this please notify us immediately by clicking the button below
<div style="text-align: left; margin-bottom: 1rem;">
    <a href="#" style="background-color: #215273; border-radius: .2rem; color: white; padding: 0.5rem 1rem; text-decoration: none; display: inline-block;"> <!-- Style the button -->
        Send notice
    </a>
</div>

Thanks,<br>
Best Regards,<br>
{{ config('app.name') }} Team.

---
If you have any inquiries, please feel free to email us at <a href="mailto:info@raffleitapp.com">info@raffleitapp.com</a>.
</x-mail::message>