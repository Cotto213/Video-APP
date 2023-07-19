<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLayout from '@/Layouts/NavLayout.vue';




//defineProps({
   // canLogin: Boolean,
//});
</script>

<template>
   <Head title="Video-App" />

   <NavLayout>

      <div class=" max-w-xl mx-auto px-4">
         <div class=" text-white font-extrabold text-3xl py-10">Add Video</div>
         <form>
            <div>
               <div class="text-gray-300">Title</div>
               <input type="text" placeholder="My video" class="
                        form-control
                      block
                      w-full
                      px-5 
                      py-1.5
                      text-xl
                      font-normal 
                      text-gray-700
                      bg-black
                      placeholder-gray-800
                      bg-clip-padding
                      border
                      border-solid
                      border-gray-600
                      rounded
                      transition
                      ease-in-out
                      m-0
                      border-transparent
                      focus:ring-0
               ">
               <span class=" text-red-500"> Error </span>
            </div>


            <div class=" my-5">
               <div>
                  <div class="text-gray-300">Thumbnail</div>
                  <input type="file" class="
                        form-control
                      block
                      w-full
                      px-3 
                      py-1.5
                      
                      text-xl
                      font-normal 
                      text-white
                      bg-clip-padding
                      border
                      border-solid
                      border-gray-600
                      focus:text-gray-500
                      focus:border-blue-600
                      rounded
                      transition
                      ease-in-out
                      m-0
                      border-transparent
                      focus:outline-none
               ">
                  <span class=" text-red-500"> Error </span>
               </div>

            </div>

            <div class=" my-5">
               <div>
                  <div class="text-gray-300">Video.mp4</div>
                  <input type="file" class="
                        form-control
                      block
                      w-full
                      px-3 
                      py-1.5
                      
                      text-xl
                      font-normal 
                      text-white
                      bg-clip-padding
                      border
                      border-solid
                      border-gray-600
                      focus:text-gray-500
                      focus:border-blue-600
                      rounded
                      transition
                      ease-in-out
                      m-0
                      border-transparent
                      focus:outline-none
               ">
                  <span class=" text-red-500"> Error </span>
               </div>

            </div>
            <div class=" my-5">
               <div class=" float-right"> 
                  <button type="submit" class=" text-white bg-green-600 hover:bg-green-700 font-bold rounded p-2">
                     Submit Video
                  </button>

               </div>

            </div>
         </form>
      </div>

   </NavLayout>
</template>

