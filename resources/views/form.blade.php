<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/v-mask/dist/v-mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.15/lodash.min.js"></script>

    <style type="text/css">
        button.loading span {
            color: transparent;
        }
    </style>
</head>

<body>
    <div id="app" class="min-h-screen flex-col w-sreen container mx-auto flex items-center justify-center">
        <div class="max-w-lg w-full flex items-center mb-8">
            <ul class="w-full flex-1 max-w-lg border border-gray-200 rounded-md">
                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm leading-5">
                    <div class="w-0 flex-1 flex items-center">
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2 flex-1 w-0 truncate">
                            parfums de marly
                        </span>
                    </div>
                    <div class="ml-4 flex-shrink-0">
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 transition duration-150 ease-in-out">
                            @{{amount}} S.A.R
                        </a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="w-full max-w-lg">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Hold Name
                    </label>
                    <input v-model="hold_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" :class="{'border-red-500': errors['hold_name']}" id="grid-first-name" type="text" placeholder="Jane Doe" />
                    <p class="text-red-500 text-xs italic" v-if="errors['hold_name']">
                        @{{errors['hold_name'][0]}}
                    </p>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Email
                    </label>
                    <input v-model="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="name@company.com" :class="{'border-red-500': errors['email']}" />
                    <p class="text-red-500 text-xs italic" v-if="errors['email']">
                        @{{errors['email'][0]}}
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Card Number
                    </label>
                    <input v-model="card_number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" placeholder="****************" :class="{'border-red-500': errors['card_number']}" />
                    <p class="text-red-500 text-xs italic" v-if="errors['card_number']">
                        @{{errors['card_number'][0]}}
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
                <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                        Expiration Date
                    </label>
                    <input v-mask="'##/##'" v-model="expiration_date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="07/21" :class="{'border-red-500': errors['expiration_date']}" />
                    <p class="text-red-500 text-xs italic" v-if="errors['expiration_year'] || errors['expiration_month']">
                        @{{errors['expiration_year'][0] ||
                            errors['expiration_month'][0] }}
                    </p>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                        CVC
                    </label>
                    <input v-model="cvc" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="123" :class="{'border-red-500': errors['cvc']}" />
                    <p class="text-red-500 text-xs italic" v-if="errors['cvc']">
                        @{{errors['cvc'][0]}}
                    </p>
                </div>
            </div>

            <div class="mt-6">
                <button @click="submitForm" :disabled="loading" :class="{'loading': loading}" class="group relative w-full items-center flex justify-center py-3 px-4 border border-transparent leading-tight font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                    <svg v-if="loading" version="1.1" class="position absolute w-12 text-indigo-500 group-hover:text-indigo-400 transition ease-in-out duration-150" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                        <path fill="#fff" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                            <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                        </path>
                    </svg>
                    <span>
                        SUBMIT
                    </span>
                </button>
            </div>
        </div>
    </div>
</body>
<script>
    Vue.directive("mask", VueMask.VueMaskDirective);
    new Vue({
        el: "#app",
        data: {
            expiration_date: "05/21",
            hold_name: "darbaoui imad",
            email: "imad@devinweb.com",
            cvc: "123",
            card_number: "4005550000000001",
            amount: 480,
            errors: {},
            loading: false,
        },
        computed: {
            expiration_date_after() {
                return _.replace(this.expiration_date, "/", "");
            },
            expiration_year() {
                return this.expiration_date_after.substring(2, 4);
            },
            expiration_month() {
                return this.expiration_date_after.substring(0, 2);
            },
        },
        methods: {

            submitForm() {
                this.loading = true;
                let endpoint = "/submit-payment"

                let {
                    card_number,
                    expiration_year,
                    expiration_month,
                    cvc,
                    email,
                    amount,
                    hold_name,
                } = this;
                axios
                    .post(endpoint, {
                        card_number,
                        expiration_year,
                        expiration_month,
                        cvc,
                        email,
                        amount,
                        hold_name,
                    })
                    .then(({
                        data
                    }) => {
                        const paymentWrapper = document.createElement(
                            "div"
                        );
                        paymentWrapper.innerHTML = data.form;
                        document.body.append(paymentWrapper);
                        const payfortForm = document.getElementById(
                            "payfort_payment_form"
                        );

                        const params = {
                            card_holder_name: this.hold_name,
                            card_number,
                            expiry_date: `${this.expiration_year}${this.expiration_month}`,
                            card_security_code: cvc,
                        };

                        for (const param in params) {
                            /* eslint-disable no-prototype-builtins */
                            if (params.hasOwnProperty(param)) {
                                const value = params[param];
                                const input = document.createElement(
                                    "input"
                                );
                                input.type = "hidden";
                                input.id = param;
                                input.name = param;
                                input.value = value;
                                payfortForm.appendChild(input);
                            }
                        }

                        payfortForm.submit.click();
                    })
                    .catch((error) => {
                        this.loading = false;
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                        }
                    });
            },
        },
    });
</script>

</html>