<!DOCTYPE html>
<html lang="en">

<head>
    <title>Error page</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/v-mask/dist/v-mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.15/lodash.min.js"></script>
</head>

<body>
    <div id="app" class="min-h-screen flex-col w-sreen container mx-auto flex items-center justify-center">
        <div class="w-full max-w-lg flex items-center justify-start mb-4">
            <a href='{!! url("/")); !!}' class="w-12 h-12 rounded-full bg-gray-200 hover:bg-gray-300 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-600 w-8" viewBox="0 0 24 24">
                    <path d="M6 20v-5.5A1.5 1.5 0 017.5 13h3a1.5 1.5 0 011.5 1.5V20h6.5a1.5 1.5 0 001.5-1.5v-8h1v8a2.5 2.5 0 01-2.5 2.5h-13A2.5 2.5 0 013 18.5v-8h1v8A1.5 1.5 0 005.5 20H6zm1 0h4v-5.5a.5.5 0 00-.5-.5h-3a.5.5 0 00-.5.5V20zm8-5.5v2a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-2a.5.5 0 00-.5-.5h-1a.5.5 0 00-.5.5zm-1 0a1.5 1.5 0 011.5-1.5h1a1.5 1.5 0 011.5 1.5v2a1.5 1.5 0 01-1.5 1.5h-1a1.5 1.5 0 01-1.5-1.5v-2zM6 11H3.5A1.5 1.5 0 012 9.5v-.807c0-.191.036-.38.107-.558l1.929-4.82A.5.5 0 014.5 3h15a.5.5 0 01.464.314l1.929 4.821a1.5 1.5 0 01.107.558V9.5a1.5 1.5 0 01-1.5 1.5H18c-.384 0-.735-.144-1-.382A1.494 1.494 0 0116 11h-3c-.384 0-.735-.144-1-.382A1.494 1.494 0 0111 11H8c-.384 0-.735-.144-1-.382A1.494 1.494 0 016 11zM4.839 4L3.036 8.507A.5.5 0 003 8.693V9.5a.5.5 0 00.5.5H6a.5.5 0 00.5-.5v-1a.5.5 0 011 0v1a.5.5 0 00.5.5h3a.5.5 0 00.5-.5v-1a.5.5 0 111 0v1a.5.5 0 00.5.5h3a.5.5 0 00.5-.5v-1a.5.5 0 111 0v1a.5.5 0 00.5.5h2.5a.5.5 0 00.5-.5v-.807a.5.5 0 00-.036-.186L19.161 4H4.84z" /></svg>
            </a>
        </div>

        <div class="w-full max-w-lg rounded-lg shadow">
            <div class="w-full items-center justify-center flex p-8">

                <span class="text-2xl text-gray-700 mr-4" style="font-family: Cairo, sans-serif;">
                    عملية فاشلة
                </span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-24 fill-current text-red-500" viewBox="0 0 24 24">
                    <g data-name="Layer 2">
                        <path d="M12 2a10 10 0 1010 10A10 10 0 0012 2zm0 15a1 1 0 111-1 1 1 0 01-1 1zm1-4a1 1 0 01-2 0V8a1 1 0 012 0z" data-name="alert-circle" />
                    </g>
                </svg>
            </div>
            <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 rounded-t-lg">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Hold Name
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2 uppercase">
                    {{ Request::get('card_holder_name') }}
                </dd>
            </div>
            <div class="bg-gray-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Email address
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ Request::get('customer_email') }}
                </dd>
            </div>
            <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Card Number
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ Request::get('card_number')?: '**** **** **** ****' }}
                </dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Amount
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    {{ Request::get('amount') }}
                </dd>
            </div>
            <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Status
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2" style="font-family: Cairo, sans-serif;">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-red-800">
                        {{ Request::get('response_message') }}
                    </span>
                </dd>
            </div>

            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 rounded-b-lg">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Shopping Cart
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                    <ul class="border border-gray-200 rounded-md">
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                            <div class="w-0 flex-1 flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2 text-sm flex-1 w-0 truncate">
                                    parfums de marly
                                </span>
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                                    480 S.A.R
                                </a>
                            </div>
                        </li>

                    </ul>
            </div>

            <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm leading-5 font-medium text-gray-500">
                    Transaction id
                </dt>
                <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2" style="font-family: Cairo, sans-serif;">
                    {{ Request::get('merchantTransactionId') }}
                </dd>
            </div>

        </div>
</body>

</html>