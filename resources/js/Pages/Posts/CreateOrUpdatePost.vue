<script setup>
import DefaultLayout from "@/Pages/layouts/DefaultLayout.vue";

import MultiSelect from "primevue/multiselect";
import InputText from "primevue/inputtext";
import Dropdown from "primevue/dropdown";
import { onMounted, ref } from "vue";
import axios from "axios";
import Button from "primevue/button";
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps(["allTags", "allCategories","post"]);

let image = ref(props.post?.image ? props.post?.image : "/images/clock.jpg");
let isLoading = ref(true);
let isSubmiting = ref(false);
let fileErrors = ref([]);
let formObj = useForm({
  id: props?.post?.id,
  image: props?.post?.image,
  category_id: props?.post?.category_id,
  tag_ids: props.post?.tag_ids,
  title: props.post?.title,
  description: props.post?.description
});
let error = ref({
  image: false,
  category_id: false,
  tag_ids: false,
  title: false,
  description: false,
});
onMounted(() => {});

const getProfileImage = (e) => {
  fileErrors.value = []; // Reset file errors
  const file = e.target.files[0]; // Get the selected file

  if (!file) return;

  // Set the image preview URL
  image.value = URL.createObjectURL(file);
  error.image = false;

  // Image validation
  if (!file.type.includes("image/")) {
    fileErrors.value.push("File must be an image");
    return;
  }
  if (file.size > 10000000) {
    // 10MB size limit
    fileErrors.value.push("File size must be less than 10MB");
    return;
  }
};


function submitForm(){

    isSubmiting.value = true;

    // validate the form
    formObj.image ? error.value.image = false : error.value.image = true;
    formObj.title ? error.value.title = false : error.value.title = true;
    formObj.category_id ? error.value.category_id = false : error.value.category_id = true;
    formObj.tag_ids ? error.value.tag_ids = false : error.value.tag_ids = true;
    formObj.description ? error.value.description = false : error.value.description = true;

    if (error.value.image || error.value.title || error.value.category_id || error.value.tag_ids || error.value.description) {
        isSubmiting.value = false;
        return false;
    }

    // submit the form
    formObj.post(route('create.update.post'))

}
</script>

<template>
  <DefaultLayout>
    <div class="flex flex-col space-y-2 mt-6">
      <div class="flex justify-between items-center">
        <h1 class="text-xl font-semibold text-gray-700">{{post?.id ? 'Edit' : 'Create'}} Posts</h1>
      </div>

      <form @submit.prevent="submitForm" class="w-full">
        <div
          :style="{
            backgroundImage: `url(${image})`,
            backgroundSize: 'cover',
            backgroundRepeat: 'no-repeat',
            backgroundPosition: 'center center',
          }"
          class="w-full h-[200px] mt-4 mb-4 border border-dashed border-[#E6E8F0] rounded-[6px] bg-[#FFFFFF] justify-center flex flex-col items-center gap-1"
        >
          <label for="upload" class="cursor-pointer flex flex-col items-center">
            <img
              src="/images/uploadimg.svg"
              class="w-[36px] h-[36px] mb-3"
              alt=""
            />
            <p
              class="font-nunito font-[400] text-[14px] leading-[20px] text-[#F59321] mb-1"
            >
              Upload a cover
              <span class="text-[#F59321]">or drag and drop</span>
            </p>
            <p
              class="font-inter font-[400] text-[12px] leading-[16px] text-white"
            >
              PNG, JPG, GIF up to 10MB
            </p>
          </label>
          <input
            id="upload"
            type="file"
            class="hidden"
            @input="formObj.image = $event.target.files[0]"
            @change="getProfileImage"
            accept=".jpg, .jpeg, .png, .gif, .bmp, .tiff, .tif, .psd, .svg"
          />
          
        </div>
        <small v-if="error.image" class="text-red-500 text-xs mb-4"> Post image is required </small>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
              for="title"
            >
              Post Title
            </label>
            <InputText
              id="title"
              v-model="formObj.title"
              aria-describedby="username-help"
              class="appearance-none block w-full bg-gray-100 text-gray-700 border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-green-500"
              placeholder="Enter Post Title"
            />
            <small v-if="error.title" class="text-xs text-red-500"> Post title is required </small>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
              for="grid-first-name"
            >
              Category
            </label>
            <Dropdown
              v-model="formObj.category_id"
              :options="allCategories"
              optionLabel="name"
              optionValue="id"
              placeholder="Select a Category"
              checkmark
              :highlightOnSelect="false"
              class="w-full md:w-14rem border bg-gray-100 border-gray-200 focus:outline-none focus:bg-white focus:border-green-500"
            />

            <small v-if="error.category_id" class="text-red-500 text-xs"> Category is required </small>
          </div>
          <div class="w-full md:w-1/2 px-3">
            <label
              class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
              for="grid-last-name"
            >
              Tags
            </label>
            <MultiSelect
              v-model="formObj.tag_ids"
              :options="allTags"
              filter
              optionLabel="name"
              optionValue="id"
              placeholder="Select Cities"
              :maxSelectedLabels="3"
              class="w-full md:w-14rem border bg-gray-100 border-gray-200 focus:outline-none focus:bg-white focus:border-green-500"
            />
            <small v-if="error.tag_ids" class="text-red-500 text-xs"> Tag is required </small>

          </div>
        </div>

        <label
          class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
          for="description"
        >
          Description
        </label>
        <QuillEditor
            theme="snow"
            id="description"
            v-model:content="formObj.description"
            style="min-height: 200px !important; max-height: 200px"
            contentType="html" 
            class="rounded"
            />
        <small v-if="error.description" class="text-red-500">Description is required</small>

        <Button
          label="Submit"
          type="submit"
          :disabled="isSubmiting"
          class="font-semibold hover:bg-blue-500 hover:text-white transition delay-200 text-blue-500 bg-white px-5 py-2 border-blue-500 border rounded-lg shadow-lg float-end mt-2"
        />
      </form>
    </div>
  </DefaultLayout>
</template>