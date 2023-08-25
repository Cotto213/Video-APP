<template>
    <div class="relative hover:z-50">
      <div
        class="rounded-lg bg-black m-2 transition ease-in-out delay-150 hover:translate-y-8 hover:scale-125 hover:bg-[gray] duration-300 "
        :class="{ 'absolute z-30': show && width > 639 }"
      >
        <div
          @mouseover="handleMouseOver"
          @mouseleave="handleMouseLeave"
        >
          <img
            class="aspect-video cursor-pointer rounded-t-lg"
            :src="thumbnail || ''"
            :class="{
              'transition ease-in-out delay-150 ': show,
              hidden: showVideo
            }"
          />
  
          <div class="w-full h-full aspect-video cursor-pointer " :class="{ hidden: !showVideo }">
            <video ref="video" :src="videoUrl || ''" type="video/mp4" />
          </div>
        </div>
            <div>
                <div class=" flex mt-1.5">
                    <div>
                        <img class=" rounded-full m-1.5 mt-2 flex items-baseline w-8 h-8" :src="image || ''" />
                    </div>
                    <div class=" px-1.5 text-white mt-1 ">
                        <div class=" text-[17px] font-extrabold w-full cursor-pointer">
                            {{ title.substring(0, 100) }}
                        </div>
                        <p class=" text-[14px] text-gray-300 font-extrabold flex gap-1 items-center cursor-pointer">
                            {{ user.substring(0, 30) }}
                            <CheckCircle fillColor="#888888" :size="17" />
                        </p>
                        <div class=" text-sm mb-1 text-gray-300 cursor-pointer">
                            {{ views }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

let isVideoPlaying = ref(false);
import { defineProps, toRefs, ref, watch, onMounted } from 'vue';
import CheckCircle from 'vue-material-design-icons/CheckCircle.vue'

const props = defineProps({
    title: String,
    user: String,
    views: String,
    image: String,
    videoUrl: String,
    thumbnail: String,
})
function handleMouseOver() {
  showVideo.value = true;
  if (!isVideoPlaying.value) {
    video.value.play();
    isVideoPlaying.value = true;
  }
}

function handleMouseLeave() {
  showVideo.value = false;
  video.value.pause();
  video.value.currentTime = 0;
  isVideoPlaying.value = false;
}

const { title, user, views, image, videoUrl, thumbnail } = toRefs(props)

let show = ref(false)
let showVideo = ref(false)
let video = ref(null)
let width = ref(document.documentElement.clientWidth)

onMounted(() => {
    window.addEventListener('resize', () => {

        width.value = document.documentElement.clientWidth;
    })
})

watch(() => show.value, (show) => {
   
    if (show) {
        showVideo.value = true
        video.value.play()
        video.value.currentTime = 0
        return ''
    }
    showVideo.value = false
    video.value.pause()
    video.vale.currentTime = 0
})
</script>

<style lang="scss" scoped></style>