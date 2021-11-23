import { shallowMount } from "@vue/test-utils";
import List from "@/components/List";

function factory(props) {
  return shallowMount(List, {
    props,
  });
}

describe("List", () => {
  it("render list of created ad campaigns", async () => {
    const wrapper = factory({
      id: 1,
      name: "Test Campaign Ad",
      from: "2021-11-04",
      to: "2023-11-23",
      daily_budget: 500,
      total_budget: 5000,
      status: 1,
      uploads: ["storage/uploads/1104202100540161832f292b808.png"],
    });

    expect(wrapper.html()).toContain("Test Campaign Ad");
    expect(wrapper.html()).toContain("2021-11-04");
    expect(wrapper.html()).toContain("2023-11-23");
    expect(wrapper.html()).toContain("500");
  });
});
