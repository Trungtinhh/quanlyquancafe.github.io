@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    @if(!empty($message))
    <div class="alert alert-success" role="alert">
        {{ $message}}
    </div>
    @endif
    <form wire:submit.prevent="{{ $submit }}">
        <div>
            <div class="grid grid-cols-6 gap-6">
                {{ $form }}
            </div>
        </div>

        @if (isset($actions))
        <div>
            {{ $actions }}
        </div>
        @endif
    </form>
</div>