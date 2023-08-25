<script setup>
import {Head, Link} from '@inertiajs/vue3';
import NavLayout from '@/Layouts/NavLayout.vue';
import CheckCircle from 'vue-material-design-icons/CheckCircle.vue'
import ThumbUpOutline from 'vue-material-design-icons/ThumbUpOutline.vue'
import ThumbDownOutline from 'vue-material-design-icons/ThumbDownOutline.vue'
import RecommendedVideos from '@/Components/RecommendedVideos.vue';


defineProps({
  videos: Object,
  comments: Array,
  recommendedVideos: Array
});

const calculateTime = (date) => {
  var commentDate = Math.abs((new Date(date).getTime() / 1000).toFixed(0));
  var currentDate = Math.abs((new Date().getTime() / 1000).toFixed(0));

  var diff = currentDate - commentDate;

  if (diff >= 31536000) {
    const years = Math.floor(diff / 31536000);
    return `${years} year${years > 1 ? 's' : ''} ago`;
  } else if (diff >= 2592000) {
    const months = Math.floor(diff / 2592000);
    return `${months} month${months > 1 ? 's' : ''} ago`;
  } else if (diff >= 86400) {
    const days = Math.floor(diff / 86400);
    return `${days} day${days > 1 ? 's' : ''} ago`;
  } else if (diff >= 3600) {
    const hours = Math.floor(diff / 3600);
    return `${hours} hour${hours > 1 ? 's' : ''} ago`;
  } else if (diff >= 60) {
    const minutes = Math.floor(diff / 60);
    return `${minutes} minute${minutes > 1 ? 's' : ''} ago`;
  } else {
    return `${diff} second${diff !== 1 ? 's' : ''} ago`;
  }

}
</script>

<template>
  <Head title="Video-App"/>

  <NavLayout>
    <div class=" xl:flex">
      <div class=" p-3">
        <video :src="videos.video || ''" autoplay controls @mouseover="show = true"/>
        <div class="text-white text-2xl font-extrabold mt-4">{{ videos.title }}</div>
        <div class=" flex items-center mb-4">

          <img :src="'https://lh3.googleusercontent.com/wNzfWfYleyTs_I4dOn4smsOXyqsdMg6JmMJLRLNQJdjPgKMjeKn55KoAWc88C4fCVnyEDQ=s85' || ''"
               class=" rounded-full m-1.5 mt-2 flex items-baseline w-8 h-8"/>

          <div class=" pl-2 mt-1 ">
            <p class=" text-white text-lg font-extrabold flex items-center">
              Cotto Developer
              <CheckCircle :size="17" fillColor="#888888"/>
            </p>
            <div class=" text-sm text-gray-300 font-extrabold">{{ videos.views }}</div>
          </div>
        </div>

        <div class=" bg-[#8684843f]  rounded-lg w-full p-3 text-white">
          <div class=" text-white text-lg font-extrabold ">{{ videos.views }}</div>
          <div class=" text-sm font-extrabold mb-6">
            Jaja texto
          </div>
          <div class=" text-sm font-extrabold">
            Jaja texto
          </div>
        </div>

        <div class="mt-6">
          <div class=" text-white text-lg font-extrabold">{{ comments.length }} Comments</div>
          <div v-for="comment in comments" :key="comment">
            <div class=" flex items-flex mb-4 mt-2 ">
              <img :src="'https://picsum.photos/id/' + (Math.random() * 100).toFixed(0) + '/100'"
                   class=" rounded-full mt-2 w-12 h-12 "/>

              <div class="pl-6 mt-1">
                <div class=" text-white font-extrabold flex items-baseline">
                  <div>{{ comment.user.name }}</div>
                  <div class=" text-gray-400 pl-3">{{ calculateTime(comment.created_at) }}</div>
                </div>
                <div class=" text-gray-50 text-sm font-semibold flex">
                  {{ comment.text }}
                </div>
                <div class=" mt-4 flex items-center">
                  <ThumbUpOutline :size="20" class="pr-2" fillColor="white"/>
                  <div class=" text-gray-50 text-sm font-extrabold pr-10">
                    {{ (Math.random() * 100).toFixed(0) }}
                  </div>
                  <ThumbDownOutline :size="20" class="pr-2" fillColor="white"/>
                  <div class=" text-gray-50 text font-extrabold pr-10">
                    {{ (Math.random() * 100).toFixed(0) }}
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>


      <div class="w-[500px] p-3 sm:block hidden">
        <div v-for="vid in recommendedVideos" :key="vid">
          <Link :href="route('videos.show', {id:vid.id})" class="flex mb-3 overflow-auto">
            <RecommendedVideos :vid="vid"/>
          </Link>
        </div>
      </div>

    </div>


  </NavLayout>
</template>

