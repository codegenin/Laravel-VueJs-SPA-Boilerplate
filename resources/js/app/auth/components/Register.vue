<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Register</div>

          <div class="card-body">
            <form method="POST" @submit.prevent="submit">
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                <div class="col-md-6">
                  <input
                    v-model="name"
                    name="name"
                    type="text"
                    class="form-control"
                    required
                    autofocus
                  >
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                <div class="col-md-6">
                  <input
                    v-model="email"
                    name="email"
                    type="text"
                    class="form-control"
                    required
                    autofocus
                  >
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                <div class="col-md-6">
                  <input
                    v-model="password"
                    name="password"
                    type="password"
                    class="form-control"
                    required
                    autofocus
                  >
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">Register</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  data() {
    return {
      name: "",
      email: "",
      password: ""
    };
  },
  methods: {
    ...mapActions({
      register: "auth/register"
    }),
    submit() {
      this.register({
        payload: {
          name: this.name,
          email: this.email,
          password: this.password
        }
      });
    }
  }
};
</script>
