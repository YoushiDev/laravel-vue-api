<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { Head, useForm } from "@inertiajs/vue3";
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from "@headlessui/vue";

export default {
  components: {
    AuthenticatedLayout,
    Dropdown,
    DropdownLink,
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
    Head,
  },
  props: {
    users: Array,
    roles: Array,
  },

  data() {
    return {
      url: null,
      isOpen: false,
    };
  },

  setup() {
    const form = useForm({
      first_name: "",
      last_name: "",
      email: "",
      password: "",
      state: "",
      country: "",
      contact: "",
      city: "",
      other_info: "",
      role_id: "",
      picture: "",
    });

    return { form };
  },
  methods: {
    createUser() {
      if (this.$refs.photo) {
        this.form.picture = this.$refs.photo.files[0];
      }
      this.form.post(route("agents.store"),{
        onFinish:() => this.form.reset()
      });
    },
    previewImage(e) {
      const file = this.$refs.photo.files[0];
      this.url = URL.createObjectURL(file);
    },
    closeModal() {
      this.isOpen = false;login
      this.form.reset()
    },
    openModal() {
      this.isOpen = true;
    },
  },
};

</script>

<template>
  <Head title="Agents" />
  <AuthenticatedLayout>
    <div
      class="px-4 md:px-10 py-4 md:py-7 bg-gray-900 rounded-md shadow shadow-gray-100 my-3"
    >
      <div class="flex items-center justify-between">
        <p
          tabindex="0"
          class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-white"
        >
          Agents
        </p>
        <div
          class="py-1 px-4 flex items-center text-sm font-medium leading-none bg-gray-200 hover:bg-gray-300 cursor-pointer rounded"
        >
          <Dropdown align="right" width="48">
            <template #trigger>
              <span class="inline-flex rounded-md">
                <button
                  type="button"
                  class="inline-flex items-center py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
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
                <DropdownLink :href="route('profile.edit')">
                  Agents
                </DropdownLink>
                <DropdownLink :href="route('profile.edit')">
                  Managers
                </DropdownLink>
                <DropdownLink :href="route('profile.edit')">
                  Developers
                </DropdownLink>
                <!-- <DropdownLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </DropdownLink> -->
              </div>
            </template>
          </Dropdown>
        </div>
      </div>
    </div>
    <div
      class="bg-gray-900 rounded-md text-white py-4 md:py-7 px-4 md:px-8 xl:px-10 shadow shadow-gray-100"
    >
      <div class="sm:flex items-center justify-between">
        <div class="flex items-center">
          <a
            class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800"
            href=" javascript:void(0)"
          >
            <div class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full">
              <p>All</p>
            </div>
          </a>
          <a
            class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
            href="javascript:void(0)"
          >
            <div
              class="py-2 px-8 text-white hover:text-indigo-700 hover:bg-indigo-100 rounded-full"
            >
              <p>Done</p>
            </div>
          </a>
          <a
            class="rounded-full focus:outline-none focus:ring-2 focus:bg-indigo-50 focus:ring-indigo-800 ml-4 sm:ml-8"
            href="javascript:void(0)"
          >
            <div
              class="py-2 px-8 text-white hover:text-indigo-700 hover:bg-indigo-100 rounded-full"
            >
              <p>Pending</p>
            </div>
          </a>
        </div>
        <button
          @click="openModal()"
          class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-900 hover:bg-indigo-600 focus:outline-none rounded"
        >
          <p class="text-sm font-medium leading-none text-white">
            <i class="fa-sharp fa-light fa-plus"></i> Add User
          </p>
        </button>
      </div>
      <div class="mt-7 overflow-x-auto">
        <table
          class="w-full table text-gray-400 border-separate space-y-6 text-sm"
        >
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
            <tr class="bg-gray-800" v-for="user in users" :key="user.id">
              <td class="p-3">
                <div class="flex align-items-center">
                  <!-- <img
                    class="rounded-full h-12 w-12 object-cover"
                    :src="'../storage'+user.picture"
                    alt="unsplash image"
                  /> -->
                  <img
                    class="rounded-full h-12 w-12 object-cover"
                    :src="`../storage/app/${user.picture}`"
                  />
                  <div class="ml-3">
                    <div class="">{{ user.name }}</div>
                    <div class="text-gray-500">{{ user.email }}</div>
                  </div>
                </div>
              </td>
              <td class="p-3">Technology</td>
              <td class="p-3 font-bold">200.00$</td>
              <td class="p-3 font-bold">200.00$</td>
              <td class="p-3">
                <span class="bg-green-300 text-gray-900 rounded px-3 py-1"
                  >available</span
                >
              </td>
              <td class="p-3">
                <a href="#" class="text-gray-400 hover:text-gray-100 mr-2">
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

    <template>
      <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
          <TransitionChild
            as="template"
            enter="duration-300 ease-out"
            enter-from="opacity-0"
            enter-to="opacity-100"
            leave="duration-200 ease-in"
            leave-from="opacity-100"
            leave-to="opacity-0"
          >
            <div class="fixed inset-0 bg-black bg-opacity-25" />
          </TransitionChild>

          <div class="fixed inset-0 overflow-y-auto">
            <div
              class="flex min-h-full items-center justify-center p-4 text-center"
            >
              <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0 scale-95"
                enter-to="opacity-100 scale-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100 scale-100"
                leave-to="opacity-0 scale-95"
              >
                <DialogPanel
                  pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                  class="w-full max-w-6xl transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
                >
                  <DialogTitle
                    as="h3"
                    class="text-lg font-medium leading-6 text-gray-900 flex justify-end items-center"
                  >
                    <button
                      type="button"
                      class="inline-flex justify-center rounded-md border border-transparent bg-indigo-800 px-4 py-2 text-sm font-medium text-indigo-100 hover:bg-indigo-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2"
                      @click="closeModal"
                    >
                      <i class="text-base fa-solid fa-circle-xmark"></i>
                    </button>
                  </DialogTitle>

                  <form @submit.prevent="createUser" ref="ClearForm">
                    <div class="relative z-0 w-full mb-6 group">
                      <div class="grid md:grid-cols-1 w-22 md:gap-6 my-2">
                        <label
                          class="peer-focus:font-medium text-sm text-gray-500"
                          >Upload Picture</label
                        >
                        <label for="ImageUpload" class="w-20">
                          <div
                            class="bg-gray-400 w-20 rounded-full h-20 cursor-pointer"
                          >
                            <img
                              v-if="url"
                              :src="url"
                              alt=""
                              class="w-20 h-20 rounded-full"
                            />
                            <img
                              v-else
                              src="/images/person.png"
                              alt=""
                              class="w-20 h-20 rounded-full"
                            />
                          </div>
                        </label>
                        <input
                          type="file"
                          name="picture"
                          @change="previewImage"
                          ref="photo"
                          id="ImageUpload"
                          class="hidden"
                        />
                      </div>
                      <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                          <input
                            type="text"
                            name="floating_first_name"
                            id="floating_first_name"
                            v-model="form.first_name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                            placeholder=" "
                            required
                          />
                          <label
                            for="floating_first_name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >First name</label
                          >
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                          <input
                            type="text"
                            name="floating_last_name"
                            id="floating_last_name"
                            v-model="form.last_name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                            placeholder=" "
                            required
                          />
                          <label
                            for="floating_last_name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Last name</label
                          >
                        </div>
                      </div>
                      <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                          <input
                            type="text"
                            name="floating_email"
                            id="floating_email"
                            v-model="form.email"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                            placeholder=" "
                            required
                          />
                          <label
                            for="floating_email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Email</label
                          >
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                          <input
                            type="text"
                            name="floating_password"
                            id="floating_password"
                            v-model="form.password"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                            placeholder=" "
                            required
                          />
                          <label
                            for="floating_password"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Password <small>( must b 8 chracters )</small>
                          </label>
                        </div>
                      </div>
                      <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                          <input
                            type="text"
                            name="floating_state"
                            id="floating_state"
                            v-model="form.state"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                            placeholder=" "
                            required
                          />
                          <label
                            for="floating_state"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >State</label
                          >
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                          <input
                            type="text"
                            name="floating_country"
                            id="floating_country"
                            v-model="form.country"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                            placeholder=" "
                            required
                          />
                          <label
                            for="floating_country"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Country</label
                          >
                        </div>
                      </div>
                      <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 w-full mb-2 group">
                          <input
                            type="text"
                            name="floating_phone"
                            id="floating_phone"
                            v-model="form.contact"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                            placeholder=" "
                            required
                          />
                          <label
                            for="floating_phone"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Phone number (123-456-7890)</label
                          >
                        </div>
                        <div class="relative z-0 w-full group">
                          <input
                            type="text"
                            name="floating_city"
                            id="floating_city"
                            v-model="form.city"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-indigo-500 focus:outline-none focus:ring-0 focus:border-indigo-600 peer"
                            placeholder=" "
                            required
                          />
                          <label
                            for="floating_city"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-600 peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >City</label
                          >
                        </div>
                      </div>
                      <div class="grid md:grid-cols-2 w-full md:gap-6">
                        <div>
                          <textarea
                            id="message"
                            rows="4"
                            v-model="form.other_info"
                            class="block p-2.5 w-full my-2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                            placeholder="Anything about this user..."
                          ></textarea>
                        </div>
                        <div>
                          <select
                            id="underline_select"
                            v-model="form.role_id"
                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                          >
                            <option selected>Choose role</option>
                            <option
                              v-for="role in roles"
                              :key="role.id"
                              :value="role.id"
                            >
                              {{ role.name }}
                            </option>
                          </select>
                        </div>
                      </div>
                      <div class="flex justify-center items-center my-3">
                        <button
                          type="submit"
                          class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                          :class="{ 'opacity-25': form.processing }"
                          :disabled="form.processing"
                        >
                          Create
                        </button>
                      </div>
                    </div>
                  </form>
                </DialogPanel>
              </TransitionChild>
            </div>
          </div>
        </Dialog>
      </TransitionRoot>
    </template>
  </AuthenticatedLayout>
</template>

