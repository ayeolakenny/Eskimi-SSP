<template>
  <header
    class="
      flex
      justify-between
      items-center
      py-4
      px-6
      bg-white
      border-b-4 border-indigo-600
      sticky
      top-0
    "
  >
    <div class="sm:block sm:ml-6">
      <div class="flex space-x-4">
        <router-link
          to="/"
          class="
            px-8
            py-3
            rounded-md
            text-lg
            font-semibold
            bg-indigo-900
            text-white
          "
          >Home</router-link
        >
        <router-link
          to="/create"
          class="
            px-8
            py-3
            rounded-md
            text-lg
            font-semibold
            bg-indigo-900
            text-white
          "
          >Create</router-link
        >
      </div>
    </div>
    <div class="flex items-center">
      <div class="relative">
        <button class="flex mx-4 text-gray-600 focus:outline-none">
          <svg
            class="h-6 w-6"
            viewBox="0 0 24 24"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M15 17H20L18.5951 15.5951C18.2141 15.2141 18 14.6973 18 14.1585V11C18 8.38757 16.3304 6.16509 14 5.34142V5C14 3.89543 13.1046 3 12 3C10.8954 3 10 3.89543 10 5V5.34142C7.66962 6.16509 6 8.38757 6 11V14.1585C6 14.6973 5.78595 15.2141 5.40493 15.5951L4 17H9M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            ></path>
          </svg>
        </button>
      </div>

      <div class="relative">
        <img
          class="
            object-cover
            relative
            block
            h-8
            w-8
            rounded-full
            overflow-hidden
            shadow
            focus:outline-none
          "
          src="https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=296&amp;q=80"
          alt="Your avatar"
        />
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "NavBar",
};
</script>
