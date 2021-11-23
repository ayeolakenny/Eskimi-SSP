<template>
  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th
                  scope="col"
                  class="
                    px-6
                    py-3
                    text-left text-xs
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider
                  "
                >
                  Name
                </th>
                <th
                  scope="col"
                  class="
                    px-6
                    py-3
                    text-left text-xs
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider
                  "
                >
                  Date
                </th>
                <th
                  scope="col"
                  class="
                    px-6
                    py-3
                    text-left text-xs
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider
                  "
                >
                  Daily Budget
                </th>
                <th
                  scope="col"
                  class="
                    px-6
                    py-3
                    text-left text-xs
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider
                  "
                >
                  Total Budget
                </th>
                <th
                  scope="col"
                  class="
                    px-6
                    py-3
                    text-left text-xs
                    font-medium
                    text-gray-500
                    uppercase
                    tracking-wider
                  "
                >
                  Status
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="campaign in campaigns" :key="campaign.id">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img
                        class="h-10 w-10 rounded-full"
                        :src="`${SERVER_URL}/${campaign.uploads[0]}`"
                        alt=""
                      />
                    </div>
                    <div class="ml-4">
                      <div
                        class="
                          text-sm
                          font-medium
                          text-blue-900
                          hover:underline
                        "
                      >
                        <router-link
                          :to="{
                            name: 'CampaignDetails',
                            params: { campaignId: campaign.id },
                          }"
                          >{{ campaign.name }}</router-link
                        >
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900 flex">
                    <div class="flex flex-col items-center mr-2">
                      <small>From</small>
                      <p>{{ campaign.from }}</p>
                    </div>
                    -
                    <div class="flex flex-col items-center ml-2">
                      <small>To</small>
                      <p>{{ campaign.to }}</p>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 text-base leading-5 font-semibold">
                    ${{ campaign.daily_budget }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 text-base leading-5 font-semibold">
                    ${{ campaign.total_budget }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    class="
                      px-2
                      inline-flex
                      text-xs
                      leading-5
                      font-semibold
                      rounded-full
                    "
                    id="status"
                    :class="
                      campaign.status === 1
                        ? 'bg-green-100 text-green-800'
                        : 'bg-red-100 text-red-800'
                    "
                  >
                    {{ campaign.status === 1 ? "Active" : "Inactive" }}
                  </span>
                </td>

                <td
                  class="
                    px-6
                    py-4
                    whitespace-nowrap
                    text-right text-sm
                    font-medium
                  "
                >
                  <button
                    @click="showPreviewModal(campaign.id)"
                    id="preview-btn"
                    class="
                      py-1
                      px-2
                      bg-indigo-500
                      text-gray-100 text-lg
                      rounded-lg
                      focus:border-4
                      border-indigo-300
                    "
                  >
                    Preview
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { SERVER_URL } from "../config/config";
export default {
  props: ["campaigns"],
  data() {
    return {
      SERVER_URL,
    };
  },
  methods: {
    showPreviewModal(campaignId) {
      let campaignImages = this.campaigns.find(
        (campaign) => campaign.id === campaignId
      ).uploads;

      this.$emit("show-preview-modal", campaignImages);
    },
  },
};
</script>
