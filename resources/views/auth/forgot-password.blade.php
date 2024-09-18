<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 text-light text-center">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-light" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="text-light text-center w-100">
        @csrf

        <!-- Email Address -->
        <div class="col-lg-4 col-md-4 col-11 mx-auto">
            <div class="d-flex ">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-100 border-secondary rounded mx-2 px-2 text-secondary form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>
          
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-light" />
        </div>

        <div class="flex items-center justify-end mt-4 ">
            <x-primary-button class="bg-primary">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
