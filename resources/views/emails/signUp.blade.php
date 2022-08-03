@component('mail::message')
# Orion Inc.

Welcome to the system {{ $user->name }}

@component('mail::button', ['url' => 'http://2-vm_monitor.test'])
    Click here
@endcomponent
@endcomponent