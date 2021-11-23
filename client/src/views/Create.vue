<template>
  <div>
    <div class="mt-10 sm:mt-0 p-3">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Campaign Advert Information
            </h3>
            <p class="mt-1 text-sm text-gray-600">
              Input your campaign advert information
            </p>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form action="" enctype="multipart/form-data" @submit="createAd">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6">
                    <label
                      for="name"
                      class="block text-sm font-medium text-gray-700"
                      >Name</label
                    >
                    <input
                      type="text"
                      name="name"
                      id="name"
                      v-model="name"
                      required="true"
                      class="
                        mt-1
                        focus:ring-indigo-500 focus:border-indigo-500
                        block
                        w-full
                        shadow-sm
                        sm:text-sm
                        border-gray-300
                        rounded-md
                      "
                    />
                  </div>

                  <div class="col-span-3">
                    <label
                      for="daily_budget"
                      class="block text-sm font-medium text-gray-700"
                    >
                      Daily Budget
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span
                        class="
                          inline-flex
                          items-center
                          px-3
                          rounded-l-md
                          border border-r-0 border-gray-300
                          bg-gray-50
                          text-gray-500 text-sm
                        "
                      >
                        $
                      </span>
                      <input
                        type="number"
                        name="daily_budget"
                        id="daily_budget"
                        v-model="daily_budget"
                        required="true"
                        class="
                          focus:ring-indigo-500 focus:border-indigo-500
                          flex-1
                          block
                          w-full
                          rounded-none rounded-r-md
                          sm:text-sm
                          border-gray-300
                        "
                        placeholder="100.00"
                      />
                    </div>
                  </div>
                  <div class="col-span-3">
                    <label
                      for="total_budget"
                      class="block text-sm font-medium text-gray-700"
                    >
                      Total Budget
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <span
                        class="
                          inline-flex
                          items-center
                          px-3
                          rounded-l-md
                          border border-r-0 border-gray-300
                          bg-gray-50
                          text-gray-500 text-sm
                        "
                      >
                        $
                      </span>
                      <input
                        type="number"
                        name="total_budget"
                        required="true"
                        v-model="total_budget"
                        id="total_budget"
                        class="
                          focus:ring-indigo-500 focus:border-indigo-500
                          flex-1
                          block
                          w-full
                          rounded-none rounded-r-md
                          sm:text-sm
                          border-gray-300
                        "
                        placeholder="100.00"
                      />
                    </div>
                  </div>

                  <div class="col-span-3">
                    <label
                      for="daily_budget"
                      class="block text-sm font-medium text-gray-700"
                    >
                      From
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <input
                        type="date"
                        name="from"
                        id="from"
                        required="true"
                        v-model="from"
                        class="
                          focus:ring-indigo-500 focus:border-indigo-500
                          flex-1
                          block
                          w-full
                          rounded-none rounded-r-md
                          sm:text-sm
                          border-gray-300
                        "
                      />
                    </div>
                  </div>
                  <div class="col-span-3">
                    <label
                      for="total_budget"
                      class="block text-sm font-medium text-gray-700"
                    >
                      To
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <input
                        type="date"
                        name="to"
                        required="true"
                        v-model="to"
                        id="to"
                        class="
                          focus:ring-indigo-500 focus:border-indigo-500
                          flex-1
                          block
                          w-full
                          rounded-none rounded-r-md
                          sm:text-sm
                          border-gray-300
                        "
                      />
                    </div>
                  </div>
                </div>
                <br />
                <image-input @changeAdImages="getAdImages($event)" />
                <ul
                  class="
                    border-2 border-dashed border-indigo-500
                    rounded-md
                    mt-2
                    p-2
                    flex
                    gap-1
                  "
                >
                  <li v-for="url in imageUrls" :key="url">
                    <img v-if="url" :src="url" alt="ad image" />
                  </li>
                </ul>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button
                  type="submit"
                  class="
                    inline-flex
                    justify-center
                    py-2
                    px-4
                    border border-transparent
                    shadow-sm
                    text-sm
                    font-medium
                    rounded-md
                    text-white
                    bg-indigo-600
                    hover:bg-indigo-700
                    focus:outline-none
                    focus:ring-2
                    focus:ring-offset-2
                    focus:ring-indigo-500
                  "
                >
                  Create
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import ImageInput from "../components/ImageInput.vue";
import { API_URL } from "../config/config";
export default {
  name: "Create",
  components: {
    ImageInput,
  },
  data() {
    return {
      selectedFiles: [],
      imageUrls: [],
      name: "",
      total_budget: "",
      daily_budget: "",
      to: "",
      from: "",
    };
  },
  methods: {
    getAdImages(imageFile) {
      const file = imageFile[0];
      this.selectedFiles = [...this.selectedFiles, file];
      this.imageUrls = [...this.imageUrls, URL.createObjectURL(imageFile[0])];
    },
    async createAd(event) {
      event.preventDefault();
      const imagesToUpload = [...this.selectedFiles];
      if (imagesToUpload.length === 0) {
        alert("Kindly upload images");
        return;
      }
      event.preventDefault();
      const data = new FormData();
      imagesToUpload.forEach((image, index) =>
        data.append(`uploads[${index}]`, image)
      );

      data.append("uploads", imagesToUpload);
      data.append("name", this.name);
      data.append("from", this.from);
      data.append("to", this.to);
      data.append("total_budget", this.total_budget);
      data.append("daily_budget", this.daily_budget);

      try {
        await fetch(`${API_URL}/campaign/create`, {
          method: "POST",
          mode: "no-cors",
          body: data,
        });
        this.$router.push("/");
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
