<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref } from "vue";
import {
  TransitionRoot,
  TransitionChild,
  Dialog,
  DialogPanel,
  DialogTitle,
} from "@headlessui/vue";

defineProps({
  users: Array,
  roles : Array,
  isOpen:Boolean
});

const isOpen = ref(false);

function closeModal() {
  isOpen.value = false;
}
function openModal() {
  isOpen.value = true;
}


</script>
<template>
  <AuthenticatedLayout>
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
                class="w-full max-w-6xl transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
              >
                <DialogTitle
                  as="h3"
                  class="text-lg font-medium leading-6 text-gray-900 flex justify-between items-center"
                >
                  <h3
                    class="font-semibold bg-indigo-500 p-2 rounded-md mb-5 text-gray-200"
                  >
                    Create Agent
                  </h3>
                  <button
                    type="button"
                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-sm font-medium text-indigo-100 hover:bg-indigo-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 focus-visible:ring-offset-2"
                    @click="closeModal"
                  >
                    <i class="text-base fa-solid fa-circle-xmark"></i>
                  </button>
                </DialogTitle>

                <form>
                  <div class="relative z-0 w-full mb-6 group">
                    <div class="grid md:grid-cols-1 w-22 md:gap-6">
                      <label
                        class="peer-focus:font-medium text-sm text-gray-500"
                        >Upload Picture</label
                      >
                      <label for="ImageUpload" class="">
                        <div
                          class="bg-gray-400 w-20 rounded-full h-20 cursor-pointer"
                        >
                          <img
                            src="images/person.png"
                            alt=""
                            class="w-20 h-20 rounded-full"
                          />
                        </div>
                      </label>
                      <input
                        type="file"
                        name=""
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
                          type="tel"
                          pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                          name="floating_phone"
                          id="floating_phone"
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
                          class="block p-2.5 w-full my-2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"
                          placeholder="Anything about this user..."
                        ></textarea>
                      </div>
                      <div>
                        <select
                          id="underline_select"
                          class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                        >
                          <option selected="selected" >Choose role</option>
                          <option
                            v-for="role in roles"
                            :key="role.id"
                            value="{{ role.id }}"
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
                      >
                        Submit
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
  </AuthenticatedLayout>
</template>