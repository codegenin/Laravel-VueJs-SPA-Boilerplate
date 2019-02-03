<template>
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
      <router-link :to="{ name: 'home'}" class="navbar-brand">LaraVue SPA Boilerplate</router-link>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle Navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto"></ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto" v-if="!user.authenticated">
          <li class="nav-item">
            <router-link :to="{name: 'login'}" class="nav-link">Login</router-link>
          </li>
          <li class="nav-item">
            <router-link :to="{name: 'register'}" class="nav-link">Register</router-link>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto" v-if="user.authenticated">
          <li class="nav-item">
            <router-link :to="{name: 'timeline'}" class="nav-link">Timeline</router-link>
          </li>
          <li class="nav-item dropdown">
            <a
              id="navbarDropdown"
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              v-pre
            >
              James
              <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a
                class="dropdown-item"
                href="#"
                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
              >Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>


<script>
import { mapGetters } from "vuex";

export default {
  computed: mapGetters({
    user: "auth/user"
  })
};
</script>
