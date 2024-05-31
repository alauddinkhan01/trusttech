<script setup>
import { ref } from 'vue'
// @ts-ignore
import VueApexCharts from 'vue3-apexcharts'
const props = defineProps(['totalPost','totalUsers']);
let userCount =ref(parseInt(props.totalUsers)); 
let postsCount =ref(parseInt(props.totalPost)); 
const chartData = {
  series: [ userCount.value, postsCount.value],
  labels: ['Users', 'Posts']
}

const chart = ref(null)

const apexOptions = {
  chart: {
    type: 'donut',
    width: 380
  },
  colors: ['#3C50E0', '#6577F3'],
  labels: chartData.labels,
  legend: {
    show: false,
    position: 'bottom'
  },
  plotOptions: {
    pie: {
      donut: {
        size: '65%',
        background: 'transparent'
      }
    }
  },
  dataLabels: {
    enabled: false
  },
  responsive: [
    {
      breakpoint: 640,
      options: {
        chart: {
          width: 200
        }
      }
    }
  ]
}
</script>

<template>
  <div
    class="col-span-12 border border-stroke bg-white px-5 pt-7.5 pb-5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-5 p-3 rounded-lg shadow-sm"
  >
    <div class="mb-3 justify-between gap-4 sm:flex">
      <div>
        <h4 class="text-xl font-bold text-black dark:text-white">Users & Posts Analytics</h4>
      </div>
      
    </div>
    <div class="mb-2">
      <div id="chartThree" class="mx-auto flex justify-center">
        <VueApexCharts
          type="donut"
          width="340"
          :options="apexOptions"
          :series="chartData.series"
          ref="chart"
        />
      </div>
    </div>
    <div class="-mx-8 flex flex-wrap items-center justify-center gap-y-3">
      
      <div class="w-full px-8 sm:w-1/2">
        <div class="flex w-full items-center">
          <span class="mr-2 block h-3 w-full max-w-3 rounded-full bg-[#3C50E0]"></span>
          <p class="flex w-full justify-between text-sm font-medium text-black dark:text-white">
            <span> Users </span>
            <span> {{ userCount }} </span>
          </p>
        </div>
      </div>
      <div class="w-full px-8 sm:w-1/2">
        <div class="flex w-full items-center">
          <span class="mr-2 block h-3 w-full max-w-3 rounded-full bg-[#6577F3]"></span>
          <p class="flex w-full justify-between text-sm font-medium text-black dark:text-white">
            <span> Posts </span>
            <span> {{ postsCount }} </span>
          </p>
        </div>
      </div>
      
      
    </div>
  </div>
</template>
