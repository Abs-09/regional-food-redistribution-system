<div class="py-10">
    <div class="px-4 sm:px-6 lg:px-8">
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif
        <div class="sm:flex sm:items-center">
            {{-- heading --}}
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Registration Requests</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the pending registrations in the platform.</p>
            </div>
        </div>
        {{-- search bar & filter --}}
        <div class="py-2 flex gap-4">
            <div class="">
                <div class="relative mt-2 flex items-center">
                    <input wire:model.live="search" type="text" name="search" id="search"
                        placeholder="Search by name"
                        class="block w-full rounded-md border-0 py-1.5 pr-14 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                        <kbd
                            class="inline-flex items-center rounded border border-gray-200 px-1 font-sans text-xs text-gray-400">⌘K</kbd>
                    </div>
                </div>
            </div>
            <div>
                <select wire:model.live="filter" id="filter" name="filter"
                    class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <option value="">All</option>
                    <option value="admin">Admin</option>
                    <option value="seeker">Seeker</option>
                    <option value="donator">Donator</option>
                    <option value="distributor">Distributor</option>
                </select>
            </div>
            <div class="flex mt-2 items-center justify-center">
                <a href="{{ route('users.requests') }}" class="text-gray-400 hover:text-pink-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
        {{-- table --}}
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($users as $user)
                <li class="relative flex justify-between gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                            src="https://www.shutterstock.com/image-vector/blank-avatar-photo-place-holder-600nw-1095249842.jpg"
                            alt="">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">
                                <a href="{{ route('users.show', $user->id) }}">
                                    <span class="absolute inset-x-0 -top-px bottom-0"></span>
                                    {{ $user->name }}
                                </a>
                            </p>
                            <p class="mt-1 flex text-xs leading-5 text-gray-500">
                                <a href="mailto:leslie.alexander@example.com"
                                    class="relative truncate hover:underline">{{ $user->email }}</a>
                            </p>
                        </div>
                    </div>
                    <div class="flex shrink-0 items-center gap-x-4">
                        <div class="hidden sm:flex sm:flex-col sm:items-end">
                            @if ($user->type == 'admin')
                                <span
                                    class="inline-flex items-center rounded-md bg-gray-50 my-2 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Admin</span>
                            @elseif($user->type == 'seeker')
                                <span
                                    class="inline-flex items-center rounded-md bg-pink-50 my-2 px-2 py-1 text-xs font-medium text-pink-600 ring-1 ring-inset ring-pink-500/10">Help
                                    Seeker</span>
                            @elseif($user->type == 'donator')
                                <span
                                    class="inline-flex items-center rounded-md bg-purple-50 my-2 px-2 py-1 text-xs font-medium text-purple-600 ring-1 ring-inset ring-purple-500/10">Donator</span>
                            @elseif($user->type == 'distributor')
                                <span
                                    class="inline-flex items-center rounded-md bg-indigo-50 my-2 px-2 py-1 text-xs font-medium text-indigo-600 ring-1 ring-inset ring-indigo-500/10">Distributor</span>
                            @endif
                            <p class="mt-1 text-xs leading-5 text-gray-500">{{ $user->created_at }}
                        </div>
                        <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

</div>
