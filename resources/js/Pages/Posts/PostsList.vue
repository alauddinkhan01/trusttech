<script setup>
import DefaultLayout from "@/Pages/layouts/DefaultLayout.vue";
import { Link, usePage } from "@inertiajs/vue3";
import Pagination from "../components/Pagination/Pagination.vue";
import { onMounted, ref } from "vue";
import axios from "axios";
import 'primeicons/primeicons.css';
import Toast from 'primevue/toast';
import { useToast } from "primevue/usetoast";
import Dialog from 'primevue/dialog';

const flashSuccess = usePage().props.flash.success;
const flashError = usePage().props.flash.error;


const toast = useToast();
let isLoading = ref(true);
let allPosts = ref([]);

const position = ref('center');
const visible = ref(false);
const postId = ref(null);

const openPosition = (pos,id) => {
    position.value = pos;
    postId.value = id;
    visible.value = true;
}

onMounted(() => {
  getPost();
  show();
  showBottomRight();
});

const show = () => {
    if (flashSuccess) {
      toast.add({ severity: 'success', summary: 'Success', detail: flashSuccess, group: 'br', life: 3000 });

    }
};

const showBottomRight = () => {
  if (flashError) {
    toast.add({ severity: 'warn', summary: 'Warning', detail: flashError, group: 'br', life: 3000 });
  }
};

function getPost() {
  axios.get(route("get.all.posts")).then((response) => {
    allPosts.value = response.data.data;
    isLoading.value = false;
  });
}

function getFilteredData(url) {
  axios.get(url).then((response) => {
    allPosts.value = response.data?.data;
  });
}
</script>

<template>
  <DefaultLayout>
    <!-- toast notifiation -->
    <Toast  position="bottom-right" group="br" />

    <!-- confirmation modal -->
    <Dialog v-model:visible="visible" header=" " :style="{ width: '25rem' }" :position="position" :modal="true" :draggable="false">
            <span class="text-[#F59321] text-center text-xl block mb-5 ">Do you want to delete post ?</span>
            
            <div class="flex justify-content-end gap-2 float-right">
                <button type="button" class="bg-slate-400 px-3 py-1 rounded-md text-white" @click="visible = false">Cancle</button>
                <Link :href="route('delete.post',postId)" class="bg-[#F59321] px-3 py-1 rounded-md text-white">Delete</Link>
            </div>
        </Dialog>
        <!-- end confirmation modal -->
    <div class="flex flex-col space-y-2 mt-6">
      <div class="flex justify-between items-center">
        <h1 class="text-xl font-semibold text-gray-700">Posts</h1>
        <Link :href="route('create.post')">
          <button
            class="font-semibold hover:bg-blue-500 hover:text-white transition delay-200 text-blue-500 bg-white px-5 py-2 border-blue-500 border rounded-lg shadow-lg"
          >
            Create Post
          </button>
        </Link>
      </div>
      <div
        v-if="isLoading"
        class="w-[full] h-[300px] flex items-center justify-center"
      >
        <div class="loader"></div>
      </div>
      <div v-else>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
          
          <table
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400"
          >
            <thead
              class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
              <tr >
                <th scope="col" class="px-16 py-3">
                  <span>Image</span>
                </th>
                <th scope="col" class="px-6 py-3">Title</th>
                <th scope="col" class="px-6 py-3">Category</th>
                <th scope="col" class="px-6 py-3">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(post, index) in allPosts.data" :key="index"
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 justify-center items-center"
              >
                <td class="p-4">
                  <img
                    :src="post.image"
                    class="w-16 md:w-[120px] max-w-full max-h-[80px] rounded-md"
                    alt="Apple Watch"
                  />
                </td>
                <td
                  class="px-6 py-4 font-semibold text-gray-900 dark:text-white truncate max-w-[100px] capitalize"
                >
                  {{post.title}}
                </td>
                <td
                  class="px-6 py-4 font-semibold text-gray-900 dark:text-white"
                >
                  {{post.category.name}}
                </td>
                <td class="px-6 py-4 flex gap-2">
                  <Link
                    :href="route('view.post',post.id)"
                    class="font-medium text-green-500 px-3 text-2xl hover:text-green-800 transition delay-200"
                    ><i class="pi pi-desktop"></i></Link
                  >
                  <Link
                    :href="route('get.post',post.id)"
                    class="font-medium text-blue-500 px-3 hover:text-blue-800 text-2xl transition delay-200"
                    ><i class="pi pi-pencil"></i></Link
                  >
                  <p
                    @click="openPosition('top',post.id)"
                    class="font-medium cursor-pointer text-red-500 px-3 hover:text-red-800 transition text-2xl delay-200"
                    ><i class="pi pi-times"></i></p
                  >
                </td>
              </tr>
              <tr v-if="allPosts.data.length == 0" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 py-6 hover:bg-gray-50 dark:hover:bg-gray-600 justify-center items-center">
                <td colspan="4 ">
                  <p class="text-center text-lg">You have no post</p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- <UserTable :users="allPosts"/> -->
        <Pagination :links="allPosts.links" :last_page="allPosts.last_page" @pageurl="getFilteredData" />

      </div>
    </div>
  </DefaultLayout>
</template>