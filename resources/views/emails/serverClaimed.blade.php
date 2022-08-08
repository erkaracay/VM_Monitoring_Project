@component('mail::message')
# Orion Inc.

The server {{ $server->name }} has been claimed by {{ $user->name }} until {{ $server->available_on }}.

Good Day,
Orion Inc.
@endcomponent