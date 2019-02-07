<template>
  <div>{{ index }}</div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  data() {
    return {
      index: null
    };
  },
  methods: {
    ...mapActions({
      setToken: "auth/setToken"
    })
  },
  mounted() {
    this.setToken().then(() => {
      axios.get("/api/timeline").then(response => {
        this.index = response.data.data;
      });
    });
  }
};
</script>
