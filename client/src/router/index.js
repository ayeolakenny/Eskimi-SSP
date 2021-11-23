import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import Create from "../views/Create.vue";
import Campaign from "../views/Campaign.vue";
import Edit from "../views/Edit";

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/create",
    name: "Create",
    component: Create,
  },
  {
    path: "/campaign/:campaignId",
    name: "CampaignDetails",
    component: Campaign,
  },
  {
    path: "/campaign/:campaignId/edit",
    name: "Edit",
    component: Edit,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
