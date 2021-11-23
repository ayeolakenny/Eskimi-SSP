<template>
  <div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <div class="flex justify-between">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
          {{ campaign.name }}
        </h3>
        <button
          class="
            py-1
            px-2
            bg-green-500
            text-gray-100 text-lg
            rounded-md
            focus:border-4
            border-green-300
          "
        >
          <router-link
            :to="{
              name: 'Edit',
              params: { campaignId: campaign.id },
            }"
            >Edit</router-link
          >
        </button>
      </div>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">
        Details about {{ campaign.name }} advertising campaign
      </p>
    </div>
    <div class="border-t border-gray-200">
      <dl>
        <div
          class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
        >
          <dt class="text-sm font-medium text-gray-500">Name</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ campaign.name }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Date</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            From: {{ campaign.from }} - To: {{ campaign.to }}
          </dd>
        </div>
        <div
          class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
        >
          <dt class="text-sm font-medium text-gray-500">Daily Budget</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            ${{ campaign.daily_budget }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Total Budget</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            ${{ campaign.total_budget }}
          </dd>
        </div>
        <div
          class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"
        >
          <dt class="text-sm font-medium text-gray-500">Status</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ campaign.status === 1 ? "Active" : "Inactive" }}
          </dd>
        </div>
        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">Attachments</dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            <ul
              role="list"
              class="border border-gray-200 rounded-md divide-y divide-gray-200"
            >
              <ul class="md:grid md:grid-cols-2">
                <li
                  class="list-none m-1 max-w-md"
                  :key="image"
                  v-for="image in campaign.uploads"
                >
                  <img :src="`${SERVER_URL}/${image}`" alt="campaign-image" />
                </li>
              </ul>
            </ul>
          </dd>
        </div>
      </dl>
    </div>
  </div>
</template>

<script>
import { SERVER_URL, API_URL } from "../config/config";
export default {
  name: "Campaign",
  created() {
    this.fetchOneCampaign(this.$route.params.campaignId);
  },
  data() {
    return {
      SERVER_URL,
      campaign: {},
    };
  },
  methods: {
    async fetchOneCampaign(campaignId) {
      const response = await fetch(`${API_URL}/campaign/${campaignId}`);
      const data = await response.json();
      this.campaign = data.data;
    },
  },
};
</script>
