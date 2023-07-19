<script setup>
import { Head, Link } from '@inertiajs/vue3';
import NavLayout from '@/Layouts/NavLayout.vue';
import VideoCard from '@/Components/VideoCard.vue';

//defineProps({
   // canLogin: Boolean,
//});
</script>

<template>
    <Head title="Video-App" />
    
    <NavLayout >
       
     <div class="grid 2xl:grid-cols-5 xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2"> 
     <VideoCard 
        title="Ducks"
         user="Cotto"
         views="3k views - 1 day ago"
         image="https://picsum.photos/id/237/100"
         videoUrl="/videos/video1.mp4"
         thumbnail="/videos/thumbnail/video1.png"
     />
        
    </div>
 
 </NavLayout>

</template>

