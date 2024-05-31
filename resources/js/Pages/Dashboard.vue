<script setup>
import DataStatsOne from "@/Pages/components/DataStats/DataStatsOne.vue";
import DefaultLayout from "./layouts/DefaultLayout.vue";
import PiChart from "@/Pages/components/Charts/PiChart.vue";
import AnalyticsCard from "@/Pages/components/AnalyticsCard/AnalyticsCard.vue";
import {ref,onMounted} from "vue";
import axios from "axios";


let analytics = ref();
let isLoading = ref(true);
let componentsKey = ref(1);
function getAnalytics(){
  axios.get(route('get.analytics')).then((response) => {
   analytics.value = response.data; 
   componentsKey.value +=1;
   isLoading.value = false;
  }).catch((err) => {
    console.log('Server error');
  })
}
onMounted(() => {
  getAnalytics();
})

</script>

<template>
  <DefaultLayout>
    <div
        v-if="isLoading"
        class="w-[full] h-[300px] flex items-center justify-center"
      >
        <div class="loader"></div>
      </div>
      <div v-else>
        <div 
          class="flex flex-wrap gap-4"
        >
        
         <AnalyticsCard v-if="$page.props.auth.roles[0] == 'admin'"
          :title="'Total Users'"
          :total="analytics?.user_count"
          icon="<svg
                    class='fill-current'
                    width='18'
                    height='18'
                    viewBox='0 0 18 18'
                    fill='none'
                    xmlns='http://www.w3.org/2000/svg'
                  >
                    <path
                      d='M9.0002 7.79065C11.0814 7.79065 12.7689 6.1594 12.7689 4.1344C12.7689 2.1094 11.0814 0.478149 9.0002 0.478149C6.91895 0.478149 5.23145 2.1094 5.23145 4.1344C5.23145 6.1594 6.91895 7.79065 9.0002 7.79065ZM9.0002 1.7719C10.3783 1.7719 11.5033 2.84065 11.5033 4.16252C11.5033 5.4844 10.3783 6.55315 9.0002 6.55315C7.62207 6.55315 6.49707 5.4844 6.49707 4.16252C6.49707 2.84065 7.62207 1.7719 9.0002 1.7719Z'
                      fill=''
                    />
                    <path
                      d='M10.8283 9.05627H7.17207C4.16269 9.05627 1.71582 11.5313 1.71582 14.5406V16.875C1.71582 17.2125 1.99707 17.5219 2.3627 17.5219C2.72832 17.5219 3.00957 17.2407 3.00957 16.875V14.5406C3.00957 12.2344 4.89394 10.3219 7.22832 10.3219H10.8564C13.1627 10.3219 15.0752 12.2063 15.0752 14.5406V16.875C15.0752 17.2125 15.3564 17.5219 15.7221 17.5219C16.0877 17.5219 16.3689 17.2407 16.3689 16.875V14.5406C16.2846 11.5313 13.8377 9.05627 10.8283 9.05627Z'
                      fill=''
                    />
                  </svg>"
         />
         <AnalyticsCard
          :title="'Total Posts'"
          :total="analytics?.posts_count"
          icon='<svg
                      class="fill-current"
                      width="18"
                      height="18"
                      viewBox="0 0 18 18"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M14.2875 0.506226H3.7125C2.75625 0.506226 1.96875 1.29373 1.96875 2.24998V15.75C1.96875 16.7062 2.75625 17.5219 3.74063 17.5219H14.3156C15.2719 17.5219 16.0875 16.7344 16.0875 15.75V2.24998C16.0313 1.29373 15.2438 0.506226 14.2875 0.506226ZM14.7656 15.75C14.7656 16.0312 14.5406 16.2562 14.2594 16.2562H3.7125C3.43125 16.2562 3.20625 16.0312 3.20625 15.75V2.24998C3.20625 1.96873 3.43125 1.74373 3.7125 1.74373H14.2875C14.5688 1.74373 14.7938 1.96873 14.7938 2.24998V15.75H14.7656Z"
                        fill=""
                      />
                      <path
                        d="M12.7965 2.6156H9.73086C9.22461 2.6156 8.80273 3.03748 8.80273 3.54373V7.25623C8.80273 7.76248 9.22461 8.18435 9.73086 8.18435H12.7965C13.3027 8.18435 13.7246 7.76248 13.7246 7.25623V3.5156C13.6965 3.03748 13.3027 2.6156 12.7965 2.6156ZM12.4309 6.8906H10.0684V3.88123H12.4309V6.8906Z"
                        fill=""
                      />
                      <path
                        d="M4.97773 4.35938H7.03086C7.36836 4.35938 7.67773 4.07812 7.67773 3.7125C7.67773 3.34687 7.39648 3.09375 7.03086 3.09375H4.94961C4.61211 3.09375 4.30273 3.375 4.30273 3.74063C4.30273 4.10625 4.61211 4.35938 4.97773 4.35938Z"
                        fill=""
                      />
                      <path
                        d="M4.97773 7.9312H7.03086C7.36836 7.9312 7.67773 7.64995 7.67773 7.28433C7.67773 6.9187 7.39648 6.63745 7.03086 6.63745H4.94961C4.61211 6.63745 4.30273 6.9187 4.30273 7.28433C4.30273 7.64995 4.61211 7.9312 4.97773 7.9312Z"
                        fill=""
                      />
                      <path
                        d="M13.0789 10.2374H4.97891C4.64141 10.2374 4.33203 10.5187 4.33203 10.8843C4.33203 11.2499 4.61328 11.5312 4.97891 11.5312H13.0789C13.4164 11.5312 13.7258 11.2499 13.7258 10.8843C13.7258 10.5187 13.4164 10.2374 13.0789 10.2374Z"
                        fill=""
                      />
                      <path
                        d="M13.0789 13.8093H4.97891C4.64141 13.8093 4.33203 14.0906 4.33203 14.4562C4.33203 14.8218 4.61328 15.1031 4.97891 15.1031H13.0789C13.4164 15.1031 13.7258 14.8218 13.7258 14.4562C13.7258 14.0906 13.4164 13.8093 13.0789 13.8093Z"
                        fill=""
                      />'
         />
        </div>
    
        <div
          class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5"
        >
          <!-- ======start PiChart -->
          <PiChart :key="componentsKey" :totalPost="analytics?.posts_count" :totalUsers="analytics?.user_count" v-if="$page.props.auth.roles[0] == 'admin'"/>
          <!-- ======end PiChart -->
        </div>
      </div>
  </DefaultLayout>
</template>
