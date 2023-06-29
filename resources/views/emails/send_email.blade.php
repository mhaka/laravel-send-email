<x-mail::message>
# Hi,

This is a notification for: {{ $text }}

Datetime:  {{ $datetime }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
