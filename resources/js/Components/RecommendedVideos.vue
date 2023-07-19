<script setup>
import { defineProps, ref, watch } from 'vue';
import CheckCircle from 'vue-material-design-icons/CheckCircle.vue';

const { vid } = defineProps({ vid: Object });

let show = ref(false);
let video = ref(null);

watch(() => show.value, (show) => {
  if (show) {
    video.value.play();
  } else {
    video.value.pause();
    video.value.currentTime = 0;
  }
});
</script>

<template>
   <div @mouseover="show = true" @mouseleave="show = false">
      <img width="340" class="aspect-video cursor-pointer rounded-lg" :src="vid.thumbnail || ''"
         :class="show ? 'delay-350 hidden' : ''" />
      <div class="w-full h-full aspect-video cursor-pointer" :class="show ? '' : 'delay-350 hidden'">
         <video width="340" ref="video" :src="vid.video || ''" type="video/mp4" />
      </div>
   </div>
   <div class="width-[500px]">
      <div class="px-1.5 pl-3 text-white mt-1">
         <div class="text-[15px] pb-1.5 font-extrabold w-full cursor-pointer">
            {{ vid.title }}
         </div>
         <p class="text-[12px] text-gray-300 font-extrabold flex gap-1 items-center cursor-pointer">
            {{ vid.user }}
            <CheckCircle fillColor="#888888" :size="17" />
         </p>
         <div  class=" whitespace-nowrap text-sm mb-1 text-gray-300 cursor-pointer">
            {{ vid.views }}
         </div>
      </div>
   </div>
</template>
