<x-app-layout>
    {{-- Bread Crumb --}}
    <nav class="flex pb-12" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            <li>
                <div>
                    <a class="text-gray-400">
                        <svg class="h-6 w-6 shrink-0 text-gray-600 group-hover:text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                        </svg>
                        <span class="sr-only">Reports</span>
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                        aria-hidden="true">
                        <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                    </svg>
                    <a href="{{ route('reports.menu') }}"
                        class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Menu</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                        aria-hidden="true">
                        <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                    </svg>
                    <a href="{{ route('reports.orders') }}"
                        class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Orders</a>
                </div>
            </li>
        </ol>
    </nav>
    {{-- Table --}}
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">User Report</h1>
                <p class="mt-2 text-sm text-gray-700">A report of users that are registered in the platform daily.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <button type="button"
                    class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Export</button>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                    Order ID</th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Order Donator</th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Order Distributor</th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Order Status</th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Delivered Address</th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Delivered Date</th>
                                <th scope="col"
                                    class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($orderseekers as $orderseeker)
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-0"># {{$orderseeker->order?->id}}
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{$orderseeker->order?->donator?->name}}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{$orderseeker->order?->distributor?->name}}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{$orderseeker->user?->name}}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{$orderseeker->user?->address}}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{$orderseeker->delivered_date}}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{$orderseeker->order?->status}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div dir="ltr" class="font-sans m-10">
                        {{ $orderseekers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
