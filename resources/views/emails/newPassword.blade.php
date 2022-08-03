@component('mail::message')
# Orion Inc.

Hello {{ $user->name }},
Your password has been changed by an admin.

New Password: {{ $password }}

Good Day,
Suphi Erkin Inc.
@endcomponent