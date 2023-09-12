<script setup>
 import 'flowbite'
 import { useForm} from "@inertiajs/vue3";
 import PrimaryInput from "@/Components/Input/PrimaryInput.vue";

 const form = useForm({
     name:'',
     email:'',
     password:'',
     password_confirmation:'',
 })

 function submit(){
     form.post(route('register'));
 }
</script>

<template>

    <section  class=" bg-[url('/img/img-register.jpg')]  bg-cover bg-gray-500 bg-blend-multiply  " >

        <div class=" blur-none flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="flex items-center mb-6 text-2xl font-semi-bold text-white dark:text-white">
                <h1 class="text-4xl font-extra bold tracking-tight leading-none text-white md:text-5xl lg:text-6xl hover:text-gray-900 hover:cursor-pointer dark:text-white">VIDEO-APP</h1>
            </div>
            <div class="w-full bg-gray-950 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-500 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-extra bold leading-tight tracking-tight text-white md:text-2xl dark:text-white">
                        Create an account
                    </h1>
                    <form class="space-y-4 md:space-y-6" @submit.prevent="submit">

                        <div>
                            <PrimaryInput v-model="form.name"
                                          :error="form.errors.name"
                                          label="Name"
                                          placeholder="Your name here"
                                          required/>
                        </div>
                        <div>
                            <PrimaryInput v-model="form.email"
                                          :error="form.errors.email"
                            label="Enter your e-mail"
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
                        <div>
                            <PrimaryInput v-model="form.password_confirmation"
                                          :error="form.errors.password_confirmation"
                                          label="Confirm your password"
                                          placeholder="........"
                                          required
                                          type="password"/>
                        </div>
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-light text-gray-500 dark:text-gray-300">I accept the <a class="font-medium text-primary-600 hover:underline dark:text-primary-500" href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                        <button :disabled="form.processing" type="submit"  class="w-full text-white bg-gray-600 hover:bg-gray-50 hover:text-blue-600 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create an account</button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Already have an account? <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>

    </section>


</template>

<style scoped>

</style>
