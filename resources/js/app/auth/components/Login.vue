<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Login</div>

          <div class="card-body">
            <div class="alert alert-danger" v-if="errors.root">{{ errors.root }}</div>

            <form method="POST" @submit.prevent="submit">
              <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control" name="email" v-model="email">
                  <span class="help-block" v-if="errors.email">{{ errors.email[0]}}</span>
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-4 col-form-label text-md-right">Password</label>
                <div class="col-md-6">
                  <input
                    id="password"
                    type="password"
                    class="form-control"
                    name="password"
                    v-model="password"
                  >
                  <span class="help-block" v-if="errors.password">{{ errors.password[0]}}</span>
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">Login</button>
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
      email: "",
      password: "",
      errors: ""
    };
  },
  methods: {
    ...mapActions({
      login: "auth/login"
    }),
    submit() {
      this.login({
        payload: {
          email: this.email,
          password: this.password
        },
        context: this
      }).then(() => {
        this.$router.replace({ name: "home" });
      });
    }
  }
};
</script>
