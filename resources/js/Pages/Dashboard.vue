<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl  dark: leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="  overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6  dark: ">You're logged in!</div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
