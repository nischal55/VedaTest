@extends('layouts.app')

@section('content')
<x-guest-layout>
        <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Use PUT method for editing -->

            {{-- <!-- Image Upload -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                <div class="mt-1">
                    <input id="image" name="image" type="file"> <!-- Keep this optional for editing -->
                </div>
            </div> --}}

            <!-- Name -->
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                    value="{{ $user->name }}" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    value="{{ $user->email }}" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                    autocomplete="new-password" />
                <!-- Note: Do not populate password fields with existing values for security reasons -->
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" autocomplete="new-password" />
                <!-- Note: Do not populate password fields with existing values for security reasons -->
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <x-primary-button class="ms-4">
                {{ __('Update') }}
            </x-primary-button>
        </form>
    </x-guest-layout>
@endsection
