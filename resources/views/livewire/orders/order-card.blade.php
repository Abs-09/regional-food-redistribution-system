<div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
    <div
        class="mx-auto grid max-w-2xl grid-cols-1 grid-rows-1 items-start gap-x-8 gap-y-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <!-- Donator Profile card -->
        <x-users.donator-card :order="$order" />

        <div
            class="-mx-4 px-4 py-8 shadow-sm ring-1 ring-gray-900/5 sm:mx-0 sm:rounded-lg sm:px-8 sm:pb-14 lg:col-span-2 lg:row-span-2 lg:row-end-2 xl:px-16 xl:pb-20 xl:pt-16">
            <!-- Order details -->
            <div class="flex gap-4">
                <h2 class="text-base font-semibold leading-6 text-gray-900">Order Details</h2>
                <x-orders.order-status :status="$order->status" />
            </div>
            <dl class="mt-6 grid grid-cols-1 text-sm leading-6 sm:grid-cols-2">
                <div class="sm:pr-4">
                    <dt class="inline text-gray-500">Order Number: #</dt>
                    <dd class="inline text-gray-700">{{ $order->id }}</time></dd>
                </div>
                <div class="mt-2 sm:mt-0 sm:pl-4">
                    <dt class="inline text-gray-500">Created at</dt>
                    <dd class="inline text-gray-700">{{ $order->created_at }}</time></dd>
                </div>
                <div class="mt-6 border-t border-gray-900 pt-6 ">
                    @if (auth()->user()->type == 'admin')
                        @if ($order->status == 'pending')
                            {{-- Accept request card --}}
                            <x-orders.accept-request-card :order="$order" />
                        @elseif ($order->status == 'accepted')
                            {{-- assign a distributor card --}}
                            <x-orders.assign-distributor :distributors="$distributors" />
                        @endif
                    @endif
                    @if (auth()->user()->type == 'distributor' && $order->status == 'pending_delivery')
                        <x-orders.complete-order :order="$order" />
                    @endif
                    {{-- Assigned Distributor Card --}}
                    <div class="mt-6 border-t border-gray-900/5 pt-6 sm:pr-4">
                        <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="text-gray-600 w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                            </svg>
                            <dt class="font-semibold text-gray-900">Distributor Assigned</dt>
                        </div>
                        <dd class="mt-2 text-gray-500"><span
                                class="font-medium text-gray-900">{{ $order->distributor?->name }}</span><br>Name:
                            {{ $order->distributor?->license }} Time: {{ $order->distributor_assigned_at }}
                        </dd>
                    </div>
                </div>
            </dl>
            {{-- plate card --}}
            <div class="flex gap-3 py-4 text-gray-500">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                    </svg>
                </div>
                <div>
                    Number of plates assigned: {{ $order->seekers->count() }} / {{ $order->number_of_plates }}
                </div>
            </div>

            {{-- Assign seeker button --}}
            @if (auth()->user()->type == 'admin' && $order->status == 'accepted')
                <div class="py-6 flex items-center">
                    <div class="mt-4 sm:flex-none">
                        <button
                            onclick="Livewire.dispatch('openModal', { component: 'orders.assign-seeker', arguments: { order: {{ $order->id }} } })"
                            type="button"
                            class="block rounded-md bg-orange-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-orange-600">Assign
                            Seekers</button>
                    </div>
                </div>
            @endif
            @if ($orderseekers->isEmpty())
                <div
                    class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                        viewBox="0 0 48 48" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 14v20c0 4.418 7.163 8 16 8 1.381 0 2.721-.087 4-.252M8 14c0 4.418 7.163 8 16 8s16-3.582 16-8M8 14c0-4.418 7.163-8 16-8s16 3.582 16 8m0 0v14m0-4c0 4.418-7.163 8-16 8S8 28.418 8 24m32 10v6m0 0v6m0-6h6m-6 0h-6" />
                    </svg>
                    <span class="mt-2 block text-sm font-semibold text-gray-900">There are no seekers assigned to this
                        order</span>
                </div>
            @else
                @if (session()->has('assign-message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline">{{ session('assign-message') }}</span>
                    </div>
                @endif
                {{-- Seeker details --}}
                <table class="mt-4 w-full whitespace-nowrap text-left text-sm leading-6">
                    <colgroup>
                        <col class="w-full">
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead class="border-b border-gray-200 text-gray-900">
                        <tr>
                            <th scope="col" class="px-0 py-3 font-semibold">To be delivered to</th>
                            <th scope="col" class="hidden py-3 pl-8 pr-0 text-right font-semibold sm:table-cell">
                                Delivery Address
                            </th>
                            <th scope="col" class="hidden py-3 pl-8 pr-0 text-right font-semibold sm:table-cell">
                                Number of Plates
                            </th>
                            <th scope="col" class="py-3 pl-8 pr-0 text-right font-semibold">Deadline</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderseekers as $orderseeker)
                            <tr class="border-b border-gray-100">
                                <td class="max-w-0 px-0 py-5 align-top">
                                    <div class="truncate font-medium text-gray-900">{{ $orderseeker->user?->name }}
                                    </div>
                                    <div class="truncate text-gray-500">{{ $orderseeker->user?->regno }}</div>
                                </td>
                                <td
                                    class="hidden py-5 pl-8 pr-0 text-wrap text-right align-top text-gray-700 sm:table-cell">
                                    {{ $orderseeker->user?->address }}</td>
                                <td
                                    class="hidden py-5 pl-8 pr-0 text-right align-top tabular-nums text-gray-700 sm:table-cell">
                                    1</td>
                                <td class="py-5 pl-8 pr-0 text-right align-top tabular-nums text-gray-700">
                                    {{ $order->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        {{-- <div class="lg:col-start-3">
            <!-- Activity feed -->
            <h2 class="text-sm font-semibold leading-6 text-gray-900">Activity</h2>
            <ul role="list" class="mt-6 space-y-6">
                <li class="relative flex gap-x-4">
                    <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                        <div class="w-px bg-gray-200"></div>
                    </div>
                    <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                        <div class="h-1.5 w-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300"></div>
                    </div>
                    <p class="flex-auto py-0.5 text-xs leading-5 text-gray-500"><span
                            class="font-medium text-gray-900">Chelsea Hagon</span> created the invoice.</p>
                    <time datetime="2023-01-23T10:32" class="flex-none py-0.5 text-xs leading-5 text-gray-500">7d
                        ago</time>
                </li>
                <li class="relative flex gap-x-4">
                    <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                        <div class="w-px bg-gray-200"></div>
                    </div>
                    <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                        <div class="h-1.5 w-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300"></div>
                    </div>
                    <p class="flex-auto py-0.5 text-xs leading-5 text-gray-500"><span
                            class="font-medium text-gray-900">Chelsea Hagon</span> edited the invoice.</p>
                    <time datetime="2023-01-23T11:03" class="flex-none py-0.5 text-xs leading-5 text-gray-500">6d
                        ago</time>
                </li>
                <li class="relative flex gap-x-4">
                    <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                        <div class="w-px bg-gray-200"></div>
                    </div>
                    <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                        <div class="h-1.5 w-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300"></div>
                    </div>
                    <p class="flex-auto py-0.5 text-xs leading-5 text-gray-500"><span
                            class="font-medium text-gray-900">Chelsea Hagon</span> sent the invoice.</p>
                    <time datetime="2023-01-23T11:24" class="flex-none py-0.5 text-xs leading-5 text-gray-500">6d
                        ago</time>
                </li>
                <li class="relative flex gap-x-4">
                    <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                        <div class="w-px bg-gray-200"></div>
                    </div>
                    <img src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="" class="relative mt-3 h-6 w-6 flex-none rounded-full bg-gray-50">
                    <div class="flex-auto rounded-md p-3 ring-1 ring-inset ring-gray-200">
                        <div class="flex justify-between gap-x-4">
                            <div class="py-0.5 text-xs leading-5 text-gray-500"><span
                                    class="font-medium text-gray-900">Chelsea Hagon</span> commented</div>
                            <time datetime="2023-01-23T15:56"
                                class="flex-none py-0.5 text-xs leading-5 text-gray-500">3d ago</time>
                        </div>
                        <p class="text-sm leading-6 text-gray-500">Called client, they reassured me the invoice would
                            be paid by the 25th.</p>
                    </div>
                </li>
                <li class="relative flex gap-x-4">
                    <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                        <div class="w-px bg-gray-200"></div>
                    </div>
                    <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                        <div class="h-1.5 w-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300"></div>
                    </div>
                    <p class="flex-auto py-0.5 text-xs leading-5 text-gray-500"><span
                            class="font-medium text-gray-900">Alex Curren</span> viewed the invoice.</p>
                    <time datetime="2023-01-24T09:12" class="flex-none py-0.5 text-xs leading-5 text-gray-500">2d
                        ago</time>
                </li>
                <li class="relative flex gap-x-4">
                    <div class="absolute left-0 top-0 flex w-6 justify-center h-6">
                        <div class="w-px bg-gray-200"></div>
                    </div>
                    <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                        <svg class="h-6 w-6 text-indigo-600" viewBox="0 0 24 24" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <p class="flex-auto py-0.5 text-xs leading-5 text-gray-500"><span
                            class="font-medium text-gray-900">Alex Curren</span> paid the invoice.</p>
                    <time datetime="2023-01-24T09:20" class="flex-none py-0.5 text-xs leading-5 text-gray-500">1d
                        ago</time>
                </li>
            </ul>

            <!-- New comment form -->
            <div class="mt-6 flex gap-x-3">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="" class="h-6 w-6 flex-none rounded-full bg-gray-50">
                <form action="#" class="relative flex-auto">
                    <div
                        class="overflow-hidden rounded-lg pb-12 shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-indigo-600">
                        <label for="comment" class="sr-only">Add your comment</label>
                        <textarea rows="2" name="comment" id="comment"
                            class="block w-full resize-none border-0 bg-transparent py-1.5 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                            placeholder="Add your comment..."></textarea>
                    </div>

                    <div class="absolute inset-x-0 bottom-0 flex justify-between py-2 pl-3 pr-2">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center">
                                <button type="button"
                                    class="-m-2.5 flex h-10 w-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500">
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only">Attach a file</span>
                                </button>
                            </div>
                            <div class="flex items-center">
                                <div>
                                    <label id="listbox-label" class="sr-only">Your mood</label>
                                    <div class="relative">
                                        <button type="button"
                                            class="relative -m-2.5 flex h-10 w-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500"
                                            aria-haspopup="listbox" aria-expanded="true"
                                            aria-labelledby="listbox-label">
                                            <span class="flex items-center justify-center">
                                                <!-- Placeholder label, show/hide based on listbox state. -->
                                                <span>
                                                    <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20"
                                                        fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.536-4.464a.75.75 0 10-1.061-1.061 3.5 3.5 0 01-4.95 0 .75.75 0 00-1.06 1.06 5 5 0 007.07 0zM9 8.5c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S7.448 7 8 7s1 .672 1 1.5zm3 1.5c.552 0 1-.672 1-1.5S12.552 7 12 7s-1 .672-1 1.5.448 1.5 1 1.5z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <span class="sr-only">Add your mood</span>
                                                </span>
                                                <!-- Selected item label, show/hide based on listbox state. -->
                                                <span>
                                                    <span
                                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-red-500">
                                                        <svg class="h-5 w-5 flex-shrink-0 text-white"
                                                            viewBox="0 0 20 20" fill="currentColor"
                                                            aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M13.5 4.938a7 7 0 11-9.006 1.737c.202-.257.59-.218.793.039.278.352.594.672.943.954.332.269.786-.049.773-.476a5.977 5.977 0 01.572-2.759 6.026 6.026 0 012.486-2.665c.247-.14.55-.016.677.238A6.967 6.967 0 0013.5 4.938zM14 12a4 4 0 01-4 4c-1.913 0-3.52-1.398-3.91-3.182-.093-.429.44-.643.814-.413a4.043 4.043 0 001.601.564c.303.038.531-.24.51-.544a5.975 5.975 0 011.315-4.192.447.447 0 01.431-.16A4.001 4.001 0 0114 12z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                    <span class="sr-only">Excited</span>
                                                </span>
                                            </span>
                                        </button>

                                        <!--
                        Select popover, show/hide based on select state.

                        Entering: ""
                          From: ""
                          To: ""
                        Leaving: "transition ease-in duration-100"
                          From: "opacity-100"
                          To: "opacity-0"
                      -->
                                        <ul class="absolute z-10 -ml-6 mt-1 w-60 rounded-lg bg-white py-3 text-base shadow ring-1 ring-black ring-opacity-5 focus:outline-none sm:ml-auto sm:w-64 sm:text-sm"
                                            tabindex="-1" role="listbox" aria-labelledby="listbox-label"
                                            aria-activedescendant="listbox-option-5">
                                            <!--
                          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                          Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
                        -->
                                            <li class="bg-white relative cursor-default select-none px-3 py-2"
                                                id="listbox-option-0" role="option">
                                                <div class="flex items-center">
                                                    <div
                                                        class="bg-red-500 flex h-8 w-8 items-center justify-center rounded-full">
                                                        <svg class="text-white h-5 w-5 flex-shrink-0"
                                                            viewBox="0 0 20 20" fill="currentColor"
                                                            aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M13.5 4.938a7 7 0 11-9.006 1.737c.202-.257.59-.218.793.039.278.352.594.672.943.954.332.269.786-.049.773-.476a5.977 5.977 0 01.572-2.759 6.026 6.026 0 012.486-2.665c.247-.14.55-.016.677.238A6.967 6.967 0 0013.5 4.938zM14 12a4 4 0 01-4 4c-1.913 0-3.52-1.398-3.91-3.182-.093-.429.44-.643.814-.413a4.043 4.043 0 001.601.564c.303.038.531-.24.51-.544a5.975 5.975 0 011.315-4.192.447.447 0 01.431-.16A4.001 4.001 0 0114 12z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="ml-3 block truncate font-medium">Excited</span>
                                                </div>
                                            </li>
                                            <!--
                          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                          Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
                        -->
                                            <li class="bg-white relative cursor-default select-none px-3 py-2"
                                                id="listbox-option-1" role="option">
                                                <div class="flex items-center">
                                                    <div
                                                        class="bg-pink-400 flex h-8 w-8 items-center justify-center rounded-full">
                                                        <svg class="text-white h-5 w-5 flex-shrink-0"
                                                            viewBox="0 0 20 20" fill="currentColor"
                                                            aria-hidden="true">
                                                            <path
                                                                d="M9.653 16.915l-.005-.003-.019-.01a20.759 20.759 0 01-1.162-.682 22.045 22.045 0 01-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 018-2.828A4.5 4.5 0 0118 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 01-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 01-.69.001l-.002-.001z" />
                                                        </svg>
                                                    </div>
                                                    <span class="ml-3 block truncate font-medium">Loved</span>
                                                </div>
                                            </li>
                                            <!--
                          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                          Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
                        -->
                                            <li class="bg-white relative cursor-default select-none px-3 py-2"
                                                id="listbox-option-2" role="option">
                                                <div class="flex items-center">
                                                    <div
                                                        class="bg-green-400 flex h-8 w-8 items-center justify-center rounded-full">
                                                        <svg class="text-white h-5 w-5 flex-shrink-0"
                                                            viewBox="0 0 20 20" fill="currentColor"
                                                            aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.536-4.464a.75.75 0 10-1.061-1.061 3.5 3.5 0 01-4.95 0 .75.75 0 00-1.06 1.06 5 5 0 007.07 0zM9 8.5c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S7.448 7 8 7s1 .672 1 1.5zm3 1.5c.552 0 1-.672 1-1.5S12.552 7 12 7s-1 .672-1 1.5.448 1.5 1 1.5z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="ml-3 block truncate font-medium">Happy</span>
                                                </div>
                                            </li>
                                            <!--
                          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                          Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
                        -->
                                            <li class="bg-white relative cursor-default select-none px-3 py-2"
                                                id="listbox-option-3" role="option">
                                                <div class="flex items-center">
                                                    <div
                                                        class="bg-yellow-400 flex h-8 w-8 items-center justify-center rounded-full">
                                                        <svg class="text-white h-5 w-5 flex-shrink-0"
                                                            viewBox="0 0 20 20" fill="currentColor"
                                                            aria-hidden="true">
                                                            <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm-3.536-3.475a.75.75 0 001.061 0 3.5 3.5 0 014.95 0 .75.75 0 101.06-1.06 5 5 0 00-7.07 0 .75.75 0 000 1.06zM9 8.5c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S7.448 7 8 7s1 .672 1 1.5zm3 1.5c.552 0 1-.672 1-1.5S12.552 7 12 7s-1 .672-1 1.5.448 1.5 1 1.5z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <span class="ml-3 block truncate font-medium">Sad</span>
                                                </div>
                                            </li>
                                            <!--
                          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                          Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
                        -->
                                            <li class="bg-white relative cursor-default select-none px-3 py-2"
                                                id="listbox-option-4" role="option">
                                                <div class="flex items-center">
                                                    <div
                                                        class="bg-blue-500 flex h-8 w-8 items-center justify-center rounded-full">
                                                        <svg class="text-white h-5 w-5 flex-shrink-0"
                                                            viewBox="0 0 20 20" fill="currentColor"
                                                            aria-hidden="true">
                                                            <path
                                                                d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z" />
                                                        </svg>
                                                    </div>
                                                    <span class="ml-3 block truncate font-medium">Thumbsy</span>
                                                </div>
                                            </li>
                                            <!--
                          Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                          Highlighted: "bg-gray-100", Not Highlighted: "bg-white"
                        -->
                                            <li class="bg-white relative cursor-default select-none px-3 py-2"
                                                id="listbox-option-5" role="option">
                                                <div class="flex items-center">
                                                    <div
                                                        class="bg-transparent flex h-8 w-8 items-center justify-center rounded-full">
                                                        <svg class="text-gray-400 h-5 w-5 flex-shrink-0"
                                                            viewBox="0 0 20 20" fill="currentColor"
                                                            aria-hidden="true">
                                                            <path
                                                                d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                                        </svg>
                                                    </div>
                                                    <span class="ml-3 block truncate font-medium">I feel nothing</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit"
                            class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Comment</button>
                    </div>
                </form>
            </div>
        </div> --}}
    </div>
</div>
