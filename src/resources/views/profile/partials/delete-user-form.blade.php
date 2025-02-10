<section class="space-y-6">
    <header>
        <!-- <h2 class="text-lg font-medium text-gray-900">
            {{ __('Supprimer le compte') }}
        </h2> -->

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.") }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Supprimer le compte') }}</x-danger-button>

    <!-- <button x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            type="submit" class="btn btn-danger">
            {{ __('Supprimer maintenant') }}
    </button> -->

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.") }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Mot de passe') }}" class="sr-only" />

                <!-- <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                /> -->

                <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="name" autocomplete="current-password" placeholder="{{ __('Mot de passe') }}
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end" style="margin-top: 2em">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Annulersss') }}
                </x-secondary-button>
                <button type="button" class="btn btn-danger">{{ __('NON') }}</button>
                <button type="submit" class="btn btn-danger">{{ __('OUI') }}</button>

                <!-- <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button> -->
            </div>
        </form>
    </x-modal>
</section>
