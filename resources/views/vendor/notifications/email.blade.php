<x-mail::message>
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Olá!')
@endif
@endif

<p>
    @lang('Você está recebendo este e-mail porque recebemos uma solicitação de verificação de e-mail para sua conta.')
</p>


{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
    @lang('Verificar e-mail')
</x-mail::button>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
<p>
    @lang('Se você não solicitou uma verificação de e-mail, nenhuma ação adicional é necessária.')
</p>

<p>
    @lang('Atenciosamente'),<br>
    {{ config('app.name') }}
</p>

@endforeach

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "Caso tenha alguma dificuldade em clicar no botão \":actionText\" acima, copie o link a seguir\n".
    'e cole no seu navegador:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>
