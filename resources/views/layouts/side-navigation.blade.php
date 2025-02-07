       <!-- Static sidebar for desktop -->
       <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
           <!-- Sidebar component, swap this element with another sidebar if you like -->
           <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4">
               {{-- logo --}}
               <div class="w-20 flex py-4">
                   <img src="\logo.png" alt="">
                   <p class="flex justify-center items-center text-center px-2 text-2xl text-pink-700 font-bold">RFDS</p>
               </div>
               {{-- nav --}}
               <nav class="flex flex-1 flex-col">
                   <ul role="list" class="flex flex-1 flex-col gap-y-7">
                       <li>
                           <ul role="list" class="-mx-2 space-y-1">
                               <li>
                                   <x-side-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                       <svg class="h-6 w-6 shrink-0 text-indigo-600" fill="none" viewBox="0 0 24 24"
                                           stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                           <path stroke-linecap="round" stroke-linejoin="round"
                                               d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                       </svg>
                                       {{ __('Dashboard') }}
                                   </x-side-nav-link>
                               </li>
                               @can('admin')
                                   <li>
                                       <x-side-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                                           <svg class="h-6 w-6 shrink-0 text-indigo-600 group-hover:text-indigo-600"
                                               fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                               aria-hidden="true">
                                               <path stroke-linecap="round" stroke-linejoin="round"
                                                   d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                           </svg>
                                           {{ __('Users') }}
                                       </x-side-nav-link>
                                   </li>
                                   <li>
                                       <x-side-nav-link :href="route('users.requests')" :active="request()->routeIs('users.requests')">
                                           <svg class="h-6 w-6 shrink-0 text-indigo-600 group-hover:text-indigo-600"
                                               fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                               aria-hidden="true">
                                               <path stroke-linecap="round" stroke-linejoin="round"
                                                   d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                           </svg>
                                           {{ __('Registration Requests') }}
                                       </x-side-nav-link>
                                   </li>
                                   <li>
                                       <x-side-nav-link :href="route('reports.menu')" :active="request()->routeIs('reports.menu')">
                                           <svg class="h-6 w-6 shrink-0 text-indigo-600 group-hover:text-indigo-600"
                                               fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                               aria-hidden="true">
                                               <path stroke-linecap="round" stroke-linejoin="round"
                                                   d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                                               <path stroke-linecap="round" stroke-linejoin="round"
                                                   d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                                           </svg>
                                           <path stroke-linecap="round" stroke-linejoin="round"
                                               d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                                           </svg>
                                           {{ __('Reports') }}
                                       </x-side-nav-link>
                                   </li>
                               @endcan
                               <li>
                                   <x-side-nav-link :href="route('orders.index')" :active="request()->routeIs('orders.index')">
                                       <svg class="h-6 w-6 shrink-0 text-indigo-600 group-hover:text-indigo-600"
                                           fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                           aria-hidden="true">
                                           <path stroke-linecap="round" stroke-linejoin="round"
                                               d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                                       </svg>
                                       {{ __('Orders') }}
                                   </x-side-nav-link>
                               </li>
                               @cannot('admin')
                                   <li>
                                       <x-side-nav-link :href="route('feedbacks.create')" :active="request()->routeIs('feedbacks.create')">
                                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                               stroke-width="1.5" stroke="currentColor" class="text-indigo-600 w-6 h-6">
                                               <path stroke-linecap="round" stroke-linejoin="round"
                                                   d="M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 0 1 .778-.332 48.294 48.294 0 0 0 5.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                           </svg>

                                           {{ __('Sumbit Feedback') }}
                                       </x-side-nav-link>
                                   </li>
                               @endcannot
                               @can('admin')
                                   <li>
                                       <x-side-nav-link :href="route('feedbacks.index')" :active="request()->routeIs('feedbacks.index')">
                                           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                               stroke-width="1.5" stroke="currentColor" class="text-indigo-600 w-6 h-6">
                                               <path stroke-linecap="round" stroke-linejoin="round"
                                                   d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                                           </svg>
                                           {{ __('Feedbacks') }}
                                       </x-side-nav-link>
                                   </li>
                               @endcan
                           </ul>
                       </li>
                       {{-- Affilliations --}}
                       <li>
                           <div class="text-xs font-semibold leading-6 text-gray-400">AFFILIATIONS</div>
                           <ul role="list" class="-mx-2 mt-2 space-y-1">
                               <li>
                                   <!-- Current: "bg-gray-50 text-indigo-600", Default: "text-gray-700 hover:text-indigo-600 hover:bg-gray-50" -->
                                   <a href="https://earth.org/what-is-food-surplus/" target="_blank"
                                       class="text-gray-400 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                       <span
                                           class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border text-[0.625rem] font-medium bg-white text-gray-400 border-gray-200 group-hover:border-indigo-600 group-hover:text-indigo-600">H</span>
                                       <span class="truncate">Earth.org</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="https://www.bankofmaldives.com.mv/" target="_blank"
                                       class="text-gray-400 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                       <span
                                           class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border text-[0.625rem] font-medium bg-white text-gray-400 border-gray-200 group-hover:border-indigo-600 group-hover:text-indigo-600">T</span>
                                       <span class="truncate">BML</span>
                                   </a>
                               </li>
                               <li>
                                   <a href="https://www.who.int/" target="_blank"
                                       class="text-gray-400 hover:text-indigo-600 hover:bg-gray-50 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold">
                                       <span
                                           class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border text-[0.625rem] font-medium bg-white text-gray-400 border-gray-200 group-hover:border-indigo-600 group-hover:text-indigo-600">W</span>
                                       <span class="truncate">WHO</span>
                                   </a>
                               </li>
                           </ul>
                       </li>
                       <li class="mt-auto">
                           <a href="/pulse"
                               class="group -mx-2 flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-50 hover:text-indigo-600">
                               <svg class="h-6 w-6 shrink-0 text-gray-400 group-hover:text-indigo-600" fill="none"
                                   viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                   <path stroke-linecap="round" stroke-linejoin="round"
                                       d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                   <path stroke-linecap="round" stroke-linejoin="round"
                                       d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                               </svg>
                               Developer Settings
                           </a>
                       </li>
                   </ul>
               </nav>
           </div>
       </div>
