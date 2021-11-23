<template>
  <div>
    <Preview
      :show-modal="showModal"
      :campaign-images="campaignImages"
      @toggle-modal="toggleModal"
    />
    <div class="flex h-screen bg-gray-200">
      <div class="flex-1 flex flex-col overflow-hidden">
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
          <div class="container mx-auto px-6 py-8">
            <div class="flex justify-between">
              <h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>
              <button
                class="
                  py-3
                  px-6
                  font-bold
                  bg-indigo-500
                  text-gray-100 text-lg
                  rounded-lg
                  focus:border-4
                  border-indigo-300
                "
              >
                <router-link to="/create">Create</router-link>
              </button>
            </div>

            <div class="mt-4">
              <div class="flex flex-wrap -mx-6">
                <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                  <div
                    class="
                      flex
                      items-center
                      px-5
                      py-6
                      shadow-sm
                      rounded-md
                      bg-white
                    "
                  >
                    <div class="mx-5">
                      <h4
                        class="text-2xl font-semibold text-gray-700"
                        id="total_campaigns"
                      >
                        {{ campaigns.length }}
                      </h4>
                      <div class="text-gray-500">Total Campaigns</div>
                    </div>
                  </div>
                </div>

                <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                  <div
                    class="
                      flex
                      items-center
                      px-5
                      py-6
                      shadow-sm
                      rounded-md
                      bg-white
                    "
                  >
                    <div class="mx-5">
                      <h4 class="text-2xl font-semibold text-gray-700">
                        {{ getActiveCampaigns().length }}
                      </h4>
                      <div class="text-gray-500">Active Campaigns</div>
                    </div>
                  </div>
                </div>

                <div class="w-full mt-6 px-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                  <div
                    class="
                      flex
                      items-center
                      px-5
                      py-6
                      shadow-sm
                      rounded-md
                      bg-white
                    "
                  >
                    <div class="mx-5">
                      <h4 class="text-2xl font-semibold text-gray-700">
                        {{ getInactiveCampaigns().length }}
                      </h4>
                      <div class="text-gray-500">Inactive Campaigns</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-8"></div>

            <div class="flex flex-col mt-8">
              <div
                class="
                  -my-2
                  py-2
                  overflow-x-auto
                  sm:-mx-6 sm:px-6
                  lg:-mx-8 lg:px-8
                "
              >
                <div
                  class="
                    align-middle
                    inline-block
                    min-w-full
                    shadow
                    overflow-hidden
                    sm:rounded-lg
                    border-b border-gray-200
                  "
                >
                  <List
                    @show-preview-modal="toggleModal"
                    :campaigns="campaigns"
                  />
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
</template>

<script>
import List from "../components/List.vue";
import Preview from "../components/Preview.vue";
import { API_URL } from "../config/config";
export default {
  name: "Home",
  components: {
    List,
    Preview,
  },
  data: () => ({
    showModal: false,
    campaigns: [],
  }),
  created() {
    this.fetchCampaigns();
  },
  methods: {
    toggleModal(campaignImages) {
      this.campaignImages = campaignImages;
      this.showModal = !this.showModal;
    },

    getActiveCampaigns() {
      return this.campaigns.filter((campaign) => campaign.status === 1);
    },

    getInactiveCampaigns() {
      return this.campaigns.filter((campaign) => campaign.status === 0);
    },

    async fetchCampaigns() {
      const response = await fetch(`${API_URL}/campaign`);
      const data = await response.json();
      this.campaigns = data.data;
    },
  },
  emits: ["toggle-preview-modal"],
};
</script>

<style></style>
