<script setup>
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
  <Head title="Welcome" />
    <main class="h-screen bg-indigo-900">
      <div class="flex justify-between text-white items-center w-full p-5">
        <div class="logo space-x-3 m-3 text-sm">
          <a href="/" class="flex gap-2 items-center hover:text-purple-200" >
            <img src="images/world.png" alt="Logo" class="h-9">
            <span>TMS</span>
          </a>
        </div>
        <div>
          <ul class="flex gap-9 m-2 text-sm" >
            <li class="cursor-pointer hover:underline hover:text-purple-200 " >Docs</li>
            <li class="cursor-pointer hover:underline hover:text-purple-200 " >Modules</li>
            <li class="cursor-pointer hover:underline hover:text-purple-200 " >Blog</li>
            <li class="cursor-pointer hover:underline hover:text-purple-200 " >Showcase</li>
            <li class="cursor-pointer hover:underline hover:text-purple-200 " ><i class="fa-solid fa-moon"></i></li>
            <li class="cursor-pointer hover:underline hover:text-purple-200 " ><i class="fa-brands fa-github"></i></li>
          </ul>
        </div>
      </div>
      <div class="flex flex-col items-center justify-center m-3 p-3 mt-11 gap-y-7">
        <div>
          <h1 class="text-8xl text-center font-extrabold text-white" >Welcome to TMS,<br></h1>
          <p class="text-center mt-6 text-white text-xl" >This system is SPA App which is  build in <b>Laravel</b>  and <b>Vue.js</b> and is full functional system.
           <br> Download it from <a href="#" class="underline text-indigo-300 font-extrabold">Github</a>, make sure to leave a star.</p>
        </div>
        <div class="flex items-center justify-center ">
          <a href="/login" class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-200 active:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-900 focus:ring-offset-2 transition ease-in-out duration-150" >Get Started</a>
        </div>
      </div>
    </main>
</template>

<style>
</style>
