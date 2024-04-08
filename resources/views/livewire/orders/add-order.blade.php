<div class="mt-5 sm:mx-auto sm:w-full sm:max-w-[480px]">
    <div class="bg-white px-6 py-6 shadow sm:rounded-lg sm:px-12">
        <h2 class="text-center text-gray-300 text-xl font-bold leading-9 tracking-tight text-gray-900">
            Make New Order Request</h2>
        <div class="flex justify-between mt-2 py-2">
            <div class="flex items-center">
                <div>
                    <img class="inline-block h-9 w-9 rounded-full"
                        src="https://www.shutterstock.com/image-vector/blank-avatar-photo-place-holder-600nw-1095249842.jpg"
                        alt="">
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                        {{ auth()->user()->donatorprofile?->donator_name }}</p>
                    <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">{{ auth()->user()->name }}
                    </p>
                </div>
            </div>
            <div class="flex items-center text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                </svg>

                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-500 group-hover:text-gray-900">
                        {{ Carbon\Carbon::today()->format('D, m-d-Y') }}</p>
                </div>
            </div>
        </div>

        <form class="space-y-6" wire:submit="save">
            @csrf
            <div>
                <label for="number_of_plates" class="block text-sm font-medium leading-6 text-gray-900">Number of Plates
                </label>
                <div class="mt-2">
                    <input wire:model="number_of_plates" id="number_of_plates" name="number_of_plates" type="number"
                        required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <x-input-error :messages="$errors->get('number_of_plates')" class="mt-2" />
            </div>

            <div>
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description of Order</label>
                <div class="mt-2">
                    <input wire:model="description" id="description" name="description" type="text" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-600 my-2 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit
                    Request</button>
            </div>
        </form>
    </div>
</div>
