<script setup>
import DefaultLayout from "@/Pages/layouts/DefaultLayout.vue";
import UserTable from "@/Pages/components/Tables/UserTable.vue";
import Pagination from "../../components/Pagination/Pagination.vue";

import { onMounted, ref } from "vue";
import axios from "axios";

let isLoading = ref(true);
let allUsers = ref([]);
onMounted(() => {
  getUserList();
});

function getUserList() {
  axios.get(route("get.users.list")).then((response) => {
    allUsers.value = response.data.data;
    isLoading.value = false;
  });
}

function getFilteredData(url) {
  axios
    .get(url)
    .then((response) => {
      allUsers.value = response.data?.data;
    });
}
</script>

<template>
  <DefaultLayout>
    <div class="flex flex-col space-y-2 mt-6">
      <h1 class="text-xl font-semibold text-gray-700">Users List</h1>

      <div
        v-if="isLoading"
        class="w-[full] h-[300px] flex items-center justify-center"
      >
        <div class="loader"></div>
      </div>
      <div v-else>
        <UserTable :users="allUsers"/>
        <Pagination :links="allUsers.links" :last_page="allUsers.last_page" @pageurl="getFilteredData" />

      </div>
    </div>
  </DefaultLayout>
</template>