<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <router-link class="navbar-brand" to="/students/2/lectures">
        Tutor<span class="text-primary">App</span>
      </router-link>
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
        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <router-link
              to="#"
              class="nav-link disabled text-dark "
              aria-current="page"
            >
              Hi, Andrej
            </router-link>
          </li>
          <li class="nav-item">
            <router-link
              to="/logout"
              class="nav-link"
              active-class="active"
              aria-current="page"
            >
              Logout
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
        { routeName: "Lectures", to: "/students/2/lectures" },
      ],
    };
  },
};
</script>