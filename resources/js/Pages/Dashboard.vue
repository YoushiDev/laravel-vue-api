<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
	users : Array,
})
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <div class="sm:px-6 w-full ">
<!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
            <div class="px-4 md:px-10 py-4 md:py-7 bg-gray-900 rounded-md shadow shadow-gray-100 my-3">
                <div class="flex items-center justify-between">
                    <p tabindex="0" class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-white">Agents</p>
                    <div class="py-1 px-4 flex items-center text-sm font-medium leading-none  bg-gray-200 hover:bg-gray-300 cursor-pointer rounded">
                        <Dropdown align="right" width="48">
                            <template #trigger  >
                                <span class="inline-flex rounded-md ">
                                    <button
                                    type="button"
                                    class="inline-flex items-center py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                    >
                                    Sort By
                                        <svg
                                            class="ml-2 -mr-0.5 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <div class="h-full p-0">
                                    <DropdownLink :href="route('profile.edit')"> Agents </DropdownLink>
                                    <DropdownLink :href="route('profile.edit')"> Managers </DropdownLink>
                                    <DropdownLink :href="route('profile.edit')"> Developers </DropdownLink>
                                    <!-- <DropdownLink :href="route('logout')" method="post" as="button">
                                        Log Out
                                    </DropdownLink> -->
                                </div>
                            </template>
                        </Dropdown>
                    </div>
                </div>
            </div>
            <div class="bg-gray-900 rounded-md text-white py-4 md:py-7 px-4 md:px-8 xl:px-10 shadow shadow-gray-100">
                <div class="sm:flex items-center justify-between">
                    <div class="flex items-center">
                        <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800" href=" javascript:void(0)">
                            <div class="py-2 px-8  bg-indigo-100 text-indigo-700 rounded-full">
                                <p>All</p>
                            </div>
                        </a>
                        <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="javascript:void(0)">
                            <div class="py-2 px-8  text-white hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                <p>Done</p>
                            </div>
                        </a>
                        <a class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8" href="javascript:void(0)">
                            <div class="py-2 px-8  text-white hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                <p>Pending</p>
                            </div>
                        </a>
                    </div>
                    <button onclick="popuphandler(true)" class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-900 hover:bg-indigo-600 focus:outline-none rounded">
                        <p class="text-sm font-medium leading-none text-white">Add Task</p>
                    </button>
                </div>
                <div class="mt-7 overflow-x-auto">
                    <table class="w-full table text-gray-400 border-separate space-y-6 text-sm">
				<thead class="bg-gray-800 text-gray-500">
					<tr>
						<th class="p-3">Name</th>
						<th class="p-3 text-left">Tickets</th>
						<th class="p-3 text-left">Pending</th>
						<th class="p-3 text-left">Completed</th>
						<th class="p-3 text-left">Status</th>
						<th class="p-3 text-left">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr class="bg-gray-800" v-for="user in users" :key="user.id" >
						<td class="p-3">
							<div class="flex align-items-center">
								<img class="rounded-full h-12 w-12  object-cover" :src="'https://i.pravatar.cc/150?u='+user.id+'@pravatar.com'" alt="unsplash image">
								<div class="ml-3">
									<div class="">{{user.name}}</div>
									<div class="text-gray-500">{{user.email}}</div>
								</div>
							</div>
						</td>
						<td class="p-3">
							Technology
						</td>
						<td class="p-3 font-bold">
							200.00$
						</td>
						<td class="p-3 font-bold">
							200.00$
						</td>
						<td class="p-3">
							<span class="bg-green-300 text-gray-900 rounded px-3 py-1">available</span>
						</td>
						<td class="p-3">
							<a href="#" class="text-gray-400 hover:text-gray-100  mr-2">
								<i class="fa-solid fa-eye"></i>
							</a>
							<a href="#" class="text-gray-400 hover:text-gray-100 mx-2">
								<i class="fa-solid fa-pen"></i>
							</a>
							<a href="#" class="text-gray-400 hover:text-gray-100 ml-2">
								<i class="fa-sharp fa-solid fa-trash"></i>
							</a>
						</td>
					</tr>
				</tbody>
			</table>
                </div>
            </div>
</div>
    </AuthenticatedLayout>
</template>
