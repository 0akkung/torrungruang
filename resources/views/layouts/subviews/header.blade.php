<nav class="bg-white border-gray-200 fixed w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between p-6">

        <!-- Heading -->
        <div class="flex">
            <img src="companyLogo.png" alt="" class="h-10 w-70">
            <p>Torrungraung</p>
        </div>
        

        <!-- Logout Button -->
        <div class="flex md:order-2">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-red-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0">
                    Logout
                </button>
            </form>

        </div>
    </div>
</nav>

