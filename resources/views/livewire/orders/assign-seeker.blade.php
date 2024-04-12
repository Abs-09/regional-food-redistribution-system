<div class="container mx-auto sm:px-6 lg:px-8 sm:py-6 lg:py-8">
    @if (session()->has('assign-message'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('assign-message') }}</span>
        </div>
    @endif
    <div x-data="{ open: false }">
        <label id="listbox-label" class="block text-sm font-medium leading-6 text-gray-900">Assigned to</label>
        <div class="relative mt-2">
            <button @click="open = !open" type="button"
                class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6"
                aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                <span class="block truncate">Choose seeker</span>
                <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>
            <ul x-show="open" @click.away="open = false"
                class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">
                @foreach ($seekers as $seeker)
                    <li wire:click="assignSeeker('{{ $seeker->id }}')"
                        class="hover:bg-gray-300 rounded text-gray-900 relative cursor-default select-none py-2 pl-8 pr-4"
                        id="listbox-option-0" role="option">
                        <span class="font-normal block truncate">{{ $seeker->name }}</span>
                        <span class="text-gray-600 absolute inset-y-0 left-0 flex items-center pl-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="py-5 text-gray-500">
        <div class="flex gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
            </svg>
        </div>
        <div class="py-3">
            <h1 class="text-gray-700 font-bold">Seeker Activity</h1>
            {{-- <History table --}}
            <ul role="list" class="divide-y divide-gray-100">
                @foreach ($seekerrecords as $seekerrecord)
                    <li class="flex justify-between gap-x-6 py-5">
                        <div class="flex min-w-0 gap-x-4">
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                src="https://cdn.pixabay.com/photo/2013/07/13/10/44/man-157699_640.png"
                                alt="">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">{{$seekerrecord->user->name}}</p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{$seekerrecord->user->regno}}</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-sm leading-6 text-gray-900">{{$seekerrecord->order?->created_at}}</p>
                            <div class="mt-1 flex items-center gap-x-1.5">
                                <div class="flex-none rounded-full bg-emerald-500/20 p-1">
                                    <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
                                </div>
                                <p class="text-xs leading-5 text-gray-500">{{$seekerrecord->order?->status}}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @if ($seekerrecords->isEmpty())
        <div
            class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
            </svg>
            <span class="mt-2 block text-sm font-semibold text-gray-900">There are no current activities</span>
        </div>
    @endif
</div>
