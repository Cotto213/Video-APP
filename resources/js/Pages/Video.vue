<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLayout from '@/Layouts/NavLayout.vue';
import CheckCircle from 'vue-material-design-icons/CheckCircle.vue'
import ThumbUpOutline from 'vue-material-design-icons/ThumbUpOutline.vue'
import ThumbDownOutline from 'vue-material-design-icons/ThumbDownOutline.vue'
import RecommendedVideos from '@/Components/RecommendedVideos.vue';



//defineProps({
   // canLogin: Boolean,
//});
</script>

<template>
      <Head title="Video-App" />

      <NavLayout>
         <div class=" xl:flex">
            <div class=" p-3">
               <video src="/videos/video1.mp4" controls autoplay></video>
               <div class=" text-white text-2xl font-extrabold mt-4"> Ducks chillin</div>
               <div class=" flex items-center mb-4">

                  <img class=" rounded-full m-1.5 mt-2 flex items-baseline w-8 h-8"
                     :src="'https://lh3.googleusercontent.com/wNzfWfYleyTs_I4dOn4smsOXyqsdMg6JmMJLRLNQJdjPgKMjeKn55KoAWc88C4fCVnyEDQ=s85' || ''" />

                  <div class=" pl-2 mt-1 ">
                     <p class=" text-white text-lg font-extrabold flex items-center">
                        Cotto Developer
                        <CheckCircle fillColor="#888888" :size="17" />
                     </p>
                     <div class=" text-sm text-gray-300 font-extrabold">20k views - 3 days ago</div>
                  </div>
               </div>

               <div class=" bg-[#8684843f]  rounded-lg w-full p-3 text-white">
                  <div class=" text-white text-lg font-extrabold ">20k views - 3 days ago</div>
                  <div class=" text-sm font-extrabold mb-6">
                     Jaja texto
                  </div>
                  <div class=" text-sm font-extrabold">
                     Jaja texto
                  </div>
               </div>

               <div class="mt-6">
                  <div class=" text-white text-lg font-extrabold">12 comments</div>
                  <div class=" flex items-flex mb-4 mt-2 ">
                     <img class=" rounded-full mt-2 w-12 h-12 "
                        :src="'https://picsum.photos/id/' + (Math.random() * 100).toFixed(0) + '/100'" />

                     <div class="pl-6 mt-1">
                        <div class=" text-white font-extrabold flex items-baseline">
                           <div>Abby</div>
                           <div class=" text-gray-400 pl-3">5 days ago</div>
                        </div>
                        <div class=" text-gray-50 text-sm font-semibold flex">
                           sadasd
                        </div>
                        <div class=" mt-4 flex items-center">
                           <ThumbUpOutline fillColor="white" :size="20" class="pr-2" />
                           <div class=" text-gray-50 text-sm font-extrabold pr-10">
                              {{ (Math.random() * 100).toFixed(0) }}
                           </div>
                           <ThumbDownOutline fillColor="white" :size="20" class="pr-2" />
                           <div class=" text-gray-50 text font-extrabold pr-10">
                              {{ (Math.random() * 100).toFixed(0) }}
                           </div>
                        </div>
                     </div>

                  </div>

               </div>

            </div>


            <div class="w-[500px] p-3 sm:block hidden">
               <div class="flex mb-3">
                  <RecommendedVideos  
               :vid="{
                  title: 'Dogs Chillin',
                  video:'/videos/video1.mp4',
                  thumbnail:'/videos/thumbnail/video1.png', 
                  user:'Cotto',
                  views:'3k views - 1 day ago'
               }"
               />
               </div>
            </div>

         </div>



   </NavLayout>
</template>

