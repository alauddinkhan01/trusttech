
<script setup>
const props = defineProps(['title','total','icon'])
</script>
<template>
    <div class="border w-[250px] h-[100px] rounded-lg">
      <div class="flex flex-col space-y-6 p-5">
        <div
          class="flex h-11.5 w-11.5 items-center justify-self-end rounded-full bg-meta-2 dark:bg-meta-4 text-blue-800"
          v-html="icon"
        ></div>
              <div class="flex justify-between items-center font-semibold text-slate-600">

                  <p>{{ title }}</p>
                  <p>{{ total }}</p>

              </div>
              
      </div>
    </div>
</template>