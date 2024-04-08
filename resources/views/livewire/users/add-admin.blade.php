<div class="mt-5 sm:mx-auto sm:w-full sm:max-w-[480px]">
    <div class="bg-white px-6 py-6 shadow sm:rounded-lg sm:px-12">
        <h2 class="text-center text-gray-300 text-xl font-bold leading-9 tracking-tight text-gray-900">
            Create a new admin account</h2>
        <form class="space-y-6" wire:submit="save">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Full
                    Name</label>
                <div class="mt-2">
                    <input wire:model="name" id="name" name="name" type="text" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <label for="regno" class="block text-sm font-medium leading-6 text-gray-900">ID Card /
                    Passport Number</label>
                <div class="mt-2">
                    <input wire:model="regno" id="regno" name="regno" type="text" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <x-input-error :messages="$errors->get('regno')" class="mt-2" />
            </div>

            <div>
                <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                <div class="mt-2">
                    <input wire:model="address" id="address" name="address" type="text" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email
                    address</label>
                <div class="mt-2">
                    <input wire:model="email" id="email" name="email" type="email" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                <div class="mt-2">
                    <input wire:model="password" id="password" name="password" type="password" autocomplete="password" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <label for="password_confirmation"
                    class="block text-sm font-medium leading-6 text-gray-900">Password Confirmation</label>
                <div class="mt-2">
                    <input wire:model="password_confirmation" id="password_confirmation" name="password_confirmation" type="password"
                        autocomplete="password_confirmation" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 my-2 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create New Admin Account</button>
            </div>
        </form>
    </div>
</div>
