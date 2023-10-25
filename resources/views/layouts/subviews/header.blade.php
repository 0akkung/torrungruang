<nav class="bg-gray-900 border-gray-200 fixed w-4/5">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <!-- Heading -->
        <div class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">
            Factory Office System
            @if (isset($title))
                <span class="text-gray-400">  >  {{ $title }}</span>
            @endif
        </div>

        <!-- Logout Button -->
        <div class="flex md:order-2">
            <button type="button" class="text-white bg-red-600 hover:bg-red-700 focus:ring-red-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0">
                Logout
            </button>
        </div>
    </div>
</nav>

