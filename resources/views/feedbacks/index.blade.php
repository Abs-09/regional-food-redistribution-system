<x-app-layout>
    {{-- Bread Crumb --}}
    <nav class="flex pb-12" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-4">
            <li>
                <div>
                    <a class="text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>

                        <span class="sr-only">FeedBacks</span>
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-300" fill="currentColor" viewBox="0 0 20 20"
                        aria-hidden="true">
                        <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                    </svg>
                    <a href="{{ route('feedbacks.index') }}"
                        class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">All Feedbacks</a>
                </div>
            </li>
        </ol>
    </nav>
    {{-- Table --}}
    <ul role="list" class="px-20 divide-y divide-gray-100">
        @foreach ($feedbacks as $feedback)
                    <li class="flex flex-wrap items-center justify-between gap-x-6 gap-y-4 py-5 sm:flex-nowrap">
            <div>
                <p class="text-sm font-semibold leading-6 text-gray-900">
                    <a href="#" class="hover:underline">{{$feedback->description}}</a>
                </p>
                <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-gray-500">
                    <p>
                        <a href="#" class="hover:underline">{{$feedback->title}}</a>
                    </p>
                    <svg viewBox="0 0 2 2" class="h-0.5 w-0.5 fill-current">
                        <circle cx="1" cy="1" r="1" />
                    </svg>
                    <p><time datetime="2023-01-23T22:34Z">{{$feedback->created_at}}</time></p>
                </div>
            </div>
            <dl class="flex w-full flex-none justify-between gap-x-8 sm:w-auto">
                <div class="flex -space-x-0.5">
                    <dt class="sr-only">Commenters</dt>
                    <dd>
                        <img class="h-6 w-6 rounded-full bg-gray-50 ring-2 ring-white"
                            src="https://images.unsplash.com/photo-1505840717430-882ce147ef2d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Emma Dorsey">
                    </dd>
                    <dd>
                        <img class="h-6 w-6 rounded-full bg-gray-50 ring-2 ring-white"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Tom Cook">
                    </dd>
                    <dd>
                        <img class="h-6 w-6 rounded-full bg-gray-50 ring-2 ring-white"
                            src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Lindsay Walton">
                    </dd>
                    <dd>
                        <img class="h-6 w-6 rounded-full bg-gray-50 ring-2 ring-white"
                            src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Benjamin Russel">
                    </dd>
                    <dd>
                        <img class="h-6 w-6 rounded-full bg-gray-50 ring-2 ring-white"
                            src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Hector Gibbons">
                    </dd>
                </div>
                <div class="flex w-16 gap-x-2.5">
                    <dt>
                        <span class="sr-only">Total comments</span>
                        <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                        </svg>
                    </dt>
                    <dd class="text-sm leading-6 text-gray-900">{{$feedback->user->name}}</dd>
                </div>
            </dl>
        </li>
        @endforeach
        <div dir="ltr" class="font-sans m-10">
            {{ $feedbacks->links() }}
        </div>
    </ul>


</x-app-layout>
