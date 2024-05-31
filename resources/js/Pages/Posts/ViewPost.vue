<script setup>
import DefaultLayout from "@/Pages/layouts/DefaultLayout.vue";
import { onMounted, ref } from "vue";
import Fieldset from 'primevue/fieldset';

const props = defineProps(["post"]);

onMounted(() => {});

</script>

<template>
  <DefaultLayout>
    <div class="flex flex-col space-y-2 mt-6">
      <div class="flex justify-between items-center">
        <h1 class="text-xl font-semibold text-gray-700">Posted by <span>{{ post?.user.name }}</span></h1>
      </div>
      <div
          :style="{
            backgroundImage: `url(${post.image})`,
            backgroundSize: 'cover',
            backgroundRepeat: 'no-repeat',
            backgroundPosition: 'center center',
          }"
          class="w-full h-[300px] mt-4 mb-4 border-2 border-dotted border-[#E6E8F0] rounded-[6px] bg-[#FFFFFF] justify-center flex flex-col items-center gap-1"
        >
        </div>
        <Fieldset :legend="post?.title" :toggleable="true" class="border-dotted border-2 p-2 ">

            <p class="m-0">
                {{ post.description.replace(/<\/?[^>]+(>|$)/g, "") }}
            </p>
        </Fieldset>
        
    </div>
  </DefaultLayout>
</template>