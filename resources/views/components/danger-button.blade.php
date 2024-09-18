<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-dark btn btn-dark bg-light my-3']) }}>
    {{ $slot }}
</button>
