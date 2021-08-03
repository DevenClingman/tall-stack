
<div
    x-data="{
        modalOpen: true,
        showSuccess: true,
    }"
    class="flex flex-col bg-indigo-900 w-full h-screen"
>
    <nav class="flex pt-left-5 justify-between container mx-auto text-indigo-200">
        <a class="text-4xl font-bold" href="/">
            <x-application-logo class="w-16 h-16 fill-current">

            </x-application-logo>
        </a>

        <div class="flex justify-end">
            @auth
                <a href="{{ route('dashboard') }}">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}">
                    Login
                </a>
            @endauth
        </div>
    </nav>
    <div class="flex container mx-auto items-center h-full">
        <div class="flex flex-col w-1/3 items-start">
            <h1 class="text-white font-bold text-5xl leading-tight mb-4">
                Simple generic landing page to subscribe
            </h1>
            <p class="text-indigo-200 text-xl mb-10">
                We are just checking the <span class="font-bold underline">TALL</span> stack. Would you mind subscribing?
            </p>
            <x-button 
            x-on:click="modalOpen = true" 
            class="py-3 px-8 bg-red-500 hover:bg-red-600"
            >
                Subscribe
            </x-button>
        </div>
    </div>

    <div 
    x-show="modalOpen"
    x-on:click.self="modalOpen = false"
    x-on:keydown.escape.window="modalOpen = false" 
    class="flex fixed top-0 bg-gray-900 bg-opacity-60 items-center w-full h-full"
    >
        <div class="m-auto bg-pink-500 shadow-2xl rounded-xl p-8">
            <p class="text-white text-5xl font-extrabold text-center">Lets do it!</p>
            <form 
                class="flex flex-col items-center p-24"
                wire:submit.prevent="subscribe"  
            >
                <x-input
                    class="px-5 py-3 w-80 border border-blue-400"
                    type="email"
                    name="name"
                    placeholder="Email address"
                    wire:model="email"
                ></x-input>
                <span class="text-gray-100 text-xs">
                    We will send you a confirmation email.
                </span>
                <x-button class="px-5 py-3 mt-5 w-80 bg-blue-500 justify-center hover:bg-blue-600">
                    Get In
                </x-button>
            </form>
        </div>
    </div>

    <div 
    x-show="showSuccess"
    x-on:click="showSuccess = false"
    x-on:keydown.escape.window="showSuccess = false" 
    class="flex fixed top-0 bg-gray-900 bg-opacity-60 items-center w-full h-full"
    >
        <div class="m-auto bg-green-500 shadow-2xl rounded-xl p-8">
            <p class="animate-pulse text-white text-9xl font-extrabold text-center">
                &check;
            </p>
            <p class="animate-pulse text-white text-5xl font-extrabold text-center mt-16">
                Great!
            </p>
            <p class="text-white text-3xl font-bold text-center">
                See you in your inbox
            </p>
        </div>
    </div>

</div>

