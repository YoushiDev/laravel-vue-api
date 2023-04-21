<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center px-3 pt-1 m-2 rounded bg-gray-100 text-sm font-medium leading-5 text-gray-500 focus:outline-none focus:border-gray-100 transition duration-150 ease-in-out h-[38px]'
        : 'inline-flex items-center px-3 pt-1 h-[38px] border-b-2 border-transparent text-sm font-medium leading-5 text-gray-100 hover:text-gray-700 hover:bg-gray-100 m-2 rounded hover:border-gray-100 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
