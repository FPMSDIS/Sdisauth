@extends('layouts.auth')
@section('form')
    <h4 class="mb-2">Bienvenue sur {{ config('app.name')}} 👋</h4>
    <p class="mb-4">Connectez-vous vous commencer votre aventure</p>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
            type="text"
            class="form-control"
            id="email"
            name="email"
            placeholder="Entrer votre email"
            autofocus
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Mot de passe</label>
            <!-- <a href="auth-forgot-password-basic.html">
                <small>Mot de passe oublié ?</small>
            </a> -->
            </div>
            <div class="input-group input-group-merge">
                <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mb-3">
            <div class="form-check">
            <input class="form-check-input" name="remember" type="checkbox" id="remember-me" />
            <label class="form-check-label" for="remember-me"> Se souvenir de moi</label>
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Connexion</button>
        </div>
    </form>

    <!-- <p class="text-center">
        <span>New on our platform?</span>
        <a href="#">
            <span>Create an account</span>
        </a>
    </p> -->
@stop
