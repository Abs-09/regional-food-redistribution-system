<div class="py-6">
    {{-- Accept Request --}}
    @if ($user->is_enabled == 0)
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Manage Registration Request</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500">
                    <p>Please review the registration request and take appropriate action</p>
                </div>
                <div class="mt-5">
                    <button wire:click="accept" wire:confirm="Are you sure you want to accept this request?" type="button"
                        class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Accept</button>
                    <button wire:click="reject" wire:confirm="Are you sure you want to reject this request?" type="button"
                        class="inline-flex items-center rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-500">Reject</button>
                </div>
            </div>
        </div>
    @endif
    {{-- success or fail message --}}
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif  
    {{-- Basic info card --}}
    <div class="my-3 overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="px-4 py-6 sm:px-6">
            <h3 class="text-base font-semibold leading-7 text-gray-900">User Information</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Personal details and application.</p>
            <div>
                @if ($user->is_enabled == 1)
                    <span
                        class="inline-flex items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-200">
                        <svg class="h-1.5 w-1.5 fill-green-500" viewBox="0 0 6 6" aria-hidden="true">
                            <circle cx="3" cy="3" r="3" />
                        </svg>
                        Active
                    </span>
                @elseif ($user->is_enabled == 2)
                    <span
                        class="inline-flex items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-200">
                        <svg class="h-1.5 w-1.5 fill-red-500" viewBox="0 0 6 6" aria-hidden="true">
                            <circle cx="3" cy="3" r="3" />
                        </svg>
                        Rejected
                    </span>
                @else
                    <span
                        class="inline-flex items-center gap-x-1.5 rounded-md px-2 py-1 text-xs font-medium text-gray-900 ring-1 ring-inset ring-gray-200">
                        <svg class="h-1.5 w-1.5 fill-orange-500" viewBox="0 0 6 6" aria-hidden="true">
                            <circle cx="3" cy="3" r="3" />
                        </svg>
                        Pending
                    </span>
                @endif
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
            </div>
        </div>
        <div class="border-t border-gray-100">
            <dl class="divide-y divide-gray-100">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">Full name</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->name }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">Email</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->email }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">ID / Passport Number</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->regno }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-900">Address</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ $user->address }}</dd>
                </div>
            </dl>
        </div>
    </div>
    {{-- Distributor details --}}
    @if ($user->type == 'distributor')
        <div class="my-3 overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-6 sm:px-6">
                <h3 class="text-base font-semibold leading-7 text-gray-900">Distributor Profile</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">This user is registered as a distributor.</p>
            </div>
            <div class="border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">Lisence Number</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $user->distributorprofile?->license_no }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    @endif
    @if ($user->type == 'donator')
        {{-- bussiness Profile --}}
        <div class="my-3 overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="px-4 py-6 sm:px-6">
                <h3 class="text-base font-semibold leading-7 text-gray-900">Donator Profile</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">This user is registered as a donator</p>
            </div>
            <div class="border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">Business / Donator Name</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $user->donatorprofile->donator_name }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">Business Registration</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $user->donatorprofile->registration }}</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-900">Business Address</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                            {{ $user->donatorprofile->business_address }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    @endif
</div>
