<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-light mt-4 rounded']) }}>
    {{ $slot }}
</button>
