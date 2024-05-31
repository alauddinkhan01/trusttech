<template>
  <div v-if="links.length > 3" class="flex justify-center my-[30px]">
    <div class="flex flex-wrap items-center -mb-1">
      <template v-for="(link, key) in links" :key="key">
        <!-- <div
          v-if="link.url === null"
          class=""
          v-html="getLabel(link.label)"
        ></div> -->
        <div @click="changePage(link.url)" class="cursor-pointer" :class="{ 'bg-[#3E1F99] rounded-full !text-[#e6e3e3]': link.active }"
          v-html="getLabel(link.label)"></div>
      </template>
    </div>
  </div>
</template>

<script>

export default {
  props: [
    "links",
    "last_page"
  ],

  methods: {
    changePage(url) {
      this.$emit('pageurl', url)
    },

    getLabel(label) {
      if (label === "&laquo; Previous") {
        return "<img src='/icons/paginationLeftArrow.svg' class='px-4 py-3 text-gray-400 text-sm leading-4 border  rounded-full w-8 h-8 !p-0 flex items-center justify-center bg-[#1D18121A] mr-2' alt=''>";
      }
      if (label === "Next &raquo;") {
        return "<img src='/icons/paginationRightArrow.svg' class='px-4 py-3 text-gray-400 text-sm leading-4 border  rounded-full w-8 h-8 !p-0 flex items-center justify-center bg-[#1D18121A] ml-2' alt=''>";
      }
      if (label === '1') {
        return `<div class='bg-[#1D18121A] text-[#oooo] font-Lato text-sm font-bold py-[6px] px-[12px] rounded-l-[6px]'>${label}</div>`
      }
      if (label == this.last_page) {
        return `<div class='bg-[#1D18121A] text-[#oooo] font-Lato text-sm font-bold py-[6px] px-[12px] rounded-r-[6px]'>${label}</div>`
      }
      return `<div class='bg-[#1D18121A] text-[#oooo] font-Lato text-sm font-bold py-[6px] px-[12px]'>${label}</div>`
    }
  }
};
</script>
