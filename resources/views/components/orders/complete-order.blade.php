    @props(['order'])
    <div class="px-4 py-5 sm:p-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900"></h3>
        <div class="mt-2 max-w-xl text-sm text-gray-500">
            <p>Please chose one of the options below to proceed with this order</p>
        </div>
        <div class="flex gap-4 mt-5">
            <button type="button" wire:click="completeOrder"
                class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Mark Order as Complete</button>
            <button type="button" wire:click="failOrder"
                class="inline-flex items-center rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-500">Mark Order as Fail</button>
        </div>
    </div>
