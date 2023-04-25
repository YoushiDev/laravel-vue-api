<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>

<template>
  <Head title="Dashboard" />
  <AuthenticatedLayout>
    <div class="sm:px-6 w-full bg-slate-500">
      <h2 class="text-white">This is Dashobard</h2>
    </div>
  </AuthenticatedLayout>
</template>
