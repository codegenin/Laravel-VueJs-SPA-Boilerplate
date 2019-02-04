<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Register</div>
          <div class="card-body">
            <form method="POST" @submit.prevent="submit">
              <div class="form-group row" v-bind:class="{ 'has-error': errors.name }">
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
                <span class="help-block" v-if="errors.name">{{ errors.name[0]}}</span>
              </div>

              <div class="form-group row" :class="{ 'has-error': errors.email }">
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
                  <span class="help-block" v-if="errors.email">{{ errors.email[0]}}</span>
                </div>
              </div>

              <div class="form-group row" :class="{ 'has-error': errors.password }">
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
                  <span class="help-block" v-if="errors.password">{{ errors.password[0]}}</span>
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
      password: "",
      errors: ""
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
        },
        context: this
      }).then(() => {
        $this.router.replace({ name: "home" });
      });
    }
  }
};
</script>
