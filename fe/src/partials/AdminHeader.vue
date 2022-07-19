<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        Tutor<span class="text-primary">App</span>
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item" v-for="item in items" :key="item">
            <router-link
              :to="item.to"
              class="nav-link"
              active-class="active"
              aria-current="page"
            >
              {{ item.routeName }}
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      items: [
        { routeName: "Groups", to: "/admin/groups" },
        { routeName: "Students", to: "/admin/students" },
        { routeName: "Lectures", to: "/admin/lectures" },
      ],
    };
  },
};
</script>