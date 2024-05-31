<script setup lang="ts">
import { useSidebarStore } from '@/Pages/stores/sidebar'
import DropdownUser from './DropdownUser.vue'
import { Link } from '@inertiajs/vue3';
import 'primeicons/primeicons.css';

const { isSidebarOpen, toggleSidebar } = useSidebarStore()
</script>

<template>
  <header
    class="sticky top-0 z-[999] flex w-full bg-[#FFFFFF]  drop-shadow-1 border-b shadow-sm dark:bg-boxdark dark:drop-shadow-none"
  >
    <div class="flex flex-grow items-center justify-between py-4 px-4 shadow-2 md:px-6 2xl:px-11">
      <div class="flex items-center gap-2 sm:gap-4 lg:hidden">
        <!-- Hamburger Toggle BTN -->
        <p
          class="z-[99999] block rounded-sm cursor-pointer border-stroke bg-white p-1.5 shadow-sm lg:hidden"
          @click="
            () => {
              console.log('Toggling Sidebar')
              toggleSidebar()
            }
          "
        >
        <i class="pi pi-bars" style="font-size: 2rem"></i>

        </p>
        <!-- Hamburger Toggle BTN -->
        <Link href="" class="block flex-shrink-0 lg:hidden" to="/">
          <img src="/images/code.jpeg" alt="Logo" class="w-10"/>
        </Link>
      </div>
      <div class="hidden sm:block">
        
      </div>

      <div class="flex items-center gap-3 2xsm:gap-7">
        

        <!-- User Area -->
        <DropdownUser />
        <!-- User Area -->
      </div>
    </div>
  </header>
</template>
