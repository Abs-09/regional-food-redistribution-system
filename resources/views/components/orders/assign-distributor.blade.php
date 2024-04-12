@props(['distributors'])

<div class="bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:p-6">
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 my-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif
        <div class="flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="text-gray-600 w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
            </svg>
            <dt class="font-semibold text-gray-900">Dispatch Order</dt>
        </div>
        <div class="mt-2 max-w-xl text-sm text-gray-500">
            <p>Please select a distributor to deliver this order</p>
        </div>
        <form wire:submit="assignDistributor" class="flex gap-4 mt-5 sm:flex sm:items-center">
            <div>
                <select wire:model="distributor_id" id="distributor_id" name="distributor_id"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @foreach ($distributors as $distributor)
                        <option value="{{ $distributor->id }}">{{ $distributor->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="mt-3 inline-flex w-1/2 items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:ml-3 sm:mt-0 sm:w-auto">Dispatch</button>
        </form>
    </div>
</div>
