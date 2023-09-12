<script setup>
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import MenuIcon from 'vue-material-design-icons/Menu.vue';
import MagnifyIcon from 'vue-material-design-icons/Magnify.vue';
import SideNavItem from '@/Components/SideNavItem.vue';
import 'flowbite'

let openSideNavOverlay = ref(false);
let width = ref(document.documentElement.clientWidth);
let openSideNav = ref(true);

onMounted(() => {
  resize();
  window.addEventListener('resize', () => {
    width.value = document.documentElement.clientWidth;
    resize();
  });
});

const resize = () => {
  if (width.value < 1280 && openSideNav.value) {
    openSideNav.value = false;
  }
  if (width.value > 1279 && !openSideNav.value) {
    openSideNav.value = true;
  }
};

const isNavOverlay = () => {
  openSideNav.value = !openSideNav.value;

};

</script>

<template>
  <div class="relative">
    <div id="topNav" class="w-[100%] h-[60px] fixed bg-black z-20 flex items-center justify-between">
      <div class="flex items-center">
        <button @click="isNavOverlay()" class="p-2 ml-3 rounded-full hover:bg-gray-800 inline-block cursor-pointer">
          <MenuIcon fillColor="#FFFFFF" :size="26" />
        </button>
        <div class="mx-2"></div>
        <div class="flex text-white items-center justify-center mr-10 cursor-pointer">
          Video-APP
        </div>
      </div>

      <div class="w-[600px] md:block hidden">
        <div class="rounded-full flex items-center bg-black">
          <input
            type="text"
            class="form-control block w-full px-5 py-1.5 text-base font-normal text-gray-200 bg-black placeholder-gray-400 bg-clip-padding border border-solid border-l-gray-700 border-y-gray-700 rounded-l-full transition ease-in-out m-0 border-transparent focus:ring-0"
            placeholder="Search"
          />
          <MagnifyIcon class="mx-6" fillColor="white" :size="23" />
        </div>
      </div>
      <div>
          <img id="avatarButton"
               type="button"
               data-dropdown-toggle="userDropdown"
               data-dropdown-placement="bottom-start"
               class=" w-10 h-8 mr-16 rounded-full cursor-pointer"
               :src="'https://picsum.photos/id/' + (Math.random() * 100).toFixed(0) + '/100'"
               alt="User dropdown">

          <!-- Dropdown menu -->
          <div id="userDropdown" class="z-10 hidden bg-white divide-y text-center divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
              <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                  <div>Bonnie Green</div>
                  <div class="font-medium truncate">name@flowbite.com</div>
              </div>
              <ul class="py-2 text-sm text-gray-700 " aria-labelledby="avatarButton">
                  <li>
                      <a href="#" class="block px-4 py-2 hover:bg-gray-200 ">Dashboard</a>
                  </li>
              </ul>
              <Link class="py-2 text-sm text-gray-700 " :href="route('logout')" method="post" as="button">
                  <a v-if="$page.props.auth.user" class="block px-4 py-2 text-black font-bold ">Sign out</a>
              </Link>
          </div>
      </div>
    </div>

    <div v-if="width > 639">
      <div  id="SideNav" class="h-[100%] fixed z-0 bg-black w-[240px]" :class="[!openSideNav ? 'w-[70px]' : 'w-[240px]']">
        <ul :class="[!openSideNav ? 'p-2' : 'px-5 pb-2 pt-[7px]']" class="mt-[60px] w-full">
          <SideNavItem :openSideNav="openSideNav" iconString="Home" />
          <SideNavItem :openSideNav="openSideNav" iconString="Add Video" />
          <SideNavItem :openSideNav="openSideNav" iconString="Delete Video" />
          <div class="border-b border-b-gray-700 my-2.5"></div>
          <SideNavItem :openSideNav="openSideNav" iconString="History" />
          <SideNavItem :openSideNav="openSideNav" iconString="Liked" />
          <SideNavItem :openSideNav="openSideNav" iconString="Subscriptions" />
          <SideNavItem :openSideNav="openSideNav" iconString="Watch Later" />
            <SideNavItem :openSideNav="openSideNav" iconString="Library" />
            <Link :href="route('logout')" method="post" as="button">
                <SideNavItem v-if="$page.props.auth.user" :openSideNav="openSideNav" iconString="Logout" />
            </Link>
          <div v-if="openSideNav">
            <div class="border-b border-b-gray-700 my-2.5" />
            <div class="text-gray-600 text-[14px] text-extrabold">
              CopyRight
              <div>Contact us</div>
              Cotto Developer
            </div>
            <div class="border-b border-b-gray-700 my-2.5"></div>
            <div class="text-gray-600 text-[14px] text-extrabold">
              Terms of Privacy & Policy
              <div>Video-App</div>
            </div>
          </div>
        </ul>
      </div>
    </div>



    <div
      class=" h-[calc(100vh-60px)] absolute right-0 top-[60px]"
      :class="{
        'w-[calc(100%-70px)]': !openSideNav,
        'w-[calc(100%-240px)]': openSideNav,
        'w-[100vw]': width < 639
      }"
    >
      <slot />
    </div>
  </div>
</template>

<style>
body {
  background-color: black;
}
</style>
