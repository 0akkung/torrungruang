<x-guest-layout>
    <div class="grid grid-cols-12 w-full h-screen overflow-hidden">
        <div class="col-span-8 items-center justify-center">
            <img src="loginCompanyImage.jpg" alt="" class="">
        </div>
        <div class="col-span-4 bg-white">
            <div class="flex flex-col items-center gap-10 justify-center py-20">
                <img src="companyLogo.png" alt="" class="w-20 h-20">
                <img src="companyName.png" alt="" class="w-100 h-20">
                <form method="POST" class="mt-4 w-[60%] " action="{{ route('login') }}">
                    @csrf

                    <!-- Username -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" placeholder="Email" class="py-3 px-5 rounded-3xl bg-[#D9D9D9] text-black  mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" placeholder="Password" class="py-3 px-5 rounded-3xl bg-[#D9D9D9] text-black  mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <hr class="border-white border-1 mt-4 px-[9rem] rounded-xl ">
                    <div class="mt-4">
                        <button type="submit" class="bg-cyan-400 w-full hover:bg-cyan-500 text-white font-bold py-2 px-4 rounded-full">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>