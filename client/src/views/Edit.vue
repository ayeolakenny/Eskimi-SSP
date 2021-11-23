<template>
  <div>
    <div class="mt-10 sm:mt-0 p-3">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
              Edit Campaign Advert Information
            </h3>
            <p class="mt-1 text-sm text-gray-600">
              Edit your campaign advert information
            </p>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form action="" enctype="multipart/form-data" @submit="updateAd">
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
                      Date (From)
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <input
                        type="date"
                        name="daily_bidget"
                        v-model="from"
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
                      Date (To)
                    </label>
                    <div class="mt-1 flex rounded-md shadow-sm">
                      <input
                        type="date"
                        name="total_budget"
                        v-model="to"
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
                        name="daily_bidget"
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
                        v-model="total_budget"
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
                </div>
                <br />
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
                  Edit
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
import { API_URL } from "../config/config";
export default {
  name: "Edit",
  created() {
    this.fetchOneCampaign(this.$route.params.campaignId);
  },
  data() {
    return {
      campaign: {},
      name: "",
      total_budget: "",
      daily_budget: "",
      to: "",
      from: "",
    };
  },
  methods: {
    async fetchOneCampaign(campaignId) {
      const response = await fetch(`${API_URL}/campaign/${campaignId}`);
      const data = await response.json();
      this.campaign = data.data;
      this.name = data.data.name;
      this.total_budget = data.data.total_budget;
      this.daily_budget = data.data.daily_budget;
      this.to = data.data.to;
      this.from = data.data.from;
    },

    async updateAd(event) {
      event.preventDefault();
      const campaignId = this.$route.params.campaignId;

      const data = {
        name: this.name,
        from: this.from,
        to: this.to,
        total_budget: this.total_budget,
        daily_budget: this.daily_budget,
      };

      try {
        await fetch(`${API_URL}/campaign/${campaignId}/edit`, {
          method: "PUT",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(data),
        });
        this.$router.push(`/campaign/${campaignId}`);
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>
