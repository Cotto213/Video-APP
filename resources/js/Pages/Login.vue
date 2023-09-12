<script setup>
import { Head, Link, useForm} from '@inertiajs/vue3'
import NavLayout from '@/Layouts/NavLayout.vue';
import 'flowbite'
import PrimaryInput from "@/Components/Input/PrimaryInput.vue";

const form = useForm({
    email:'',
    password:'',
    remember: false,
});

function submit (){
    form.post(route('login'));
}

</script>

<template>
    <Head title="Log in" />
    <section class="bg-[url('/img/img-login.jpg')]  bg-cover bg-gray-600 bg-blend-multiply dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div  class="flex items-center mb-6 text-2xl font-semibold text-white dark:text-white">
                <h1 class="text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl  hover:cursor-pointer dark:text-white">VIDEO-APP</h1>

            </div>
            <div class="w-full bg-gray-950 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-500 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-extrabold leading-tight tracking-tight text-white md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" @submit.prevent="submit">
                        <div>
                            <PrimaryInput v-model="form.email"
                                          :error="form.errors.email"
                                          label="Enter your email"
                                          placeholder="example@example.com"
                                          required
                                          type="email"/>
                        </div>

                        <div>
                            <PrimaryInput v-model="form.password"
                                          :error="form.errors.password"
                                          label="Enter your password"
                                          placeholder="........"
                                          required
                                          type="password"/>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input v-model="form.remember" id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                </div>
                            </div>
                            <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                        </div>
                        <button  type="submit" class="w-full text-white bg-gray-600 hover:bg-gray-50 hover:text-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <Link :href="route('register') " class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</Link>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>


</template>

<style scoped>

</style>
